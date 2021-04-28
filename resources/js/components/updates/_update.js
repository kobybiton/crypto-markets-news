export class Update {
    static initialize(surface, {
        renderRate = 1
    } = {}) {
        this.$surface = $(surface).hide().prop('hidden', false);
        this.renderRate = renderRate;
    }

    static get queue() {
        return Update._queue || (Update._queue = new Queue);
    }

    // #region Listen

    static listenTo(url, {
        rate = 30
    } = {}) {
        this.url = url;
        this.rate = rate;
        this.isListening = true;
    }

    static get isListening() {
        return this._isListening;
    }

    static set isListening(isListening) {
        if (this.isListening != isListening) {
            this._isListening = isListening;
            if (isListening) {
                this.listeningInterval = setInterval(() => this.listen(), this.rate * 1000);
            } else if (this.listeningInterval) {
                clearTimeout(this.listeningInterval);
            }
        }
    }

    static listen() {
        $.ajax({
            url: this.url,
            data: {
                rate: this.rate
            },
            success: (updates) => {
                if (updates.constructor == [].constructor) {
                    for (let update of updates || []) {
                        this.broadcast(new this(update));
                    }
                } else {
                    this.broadcast(new this(updates));
                }
            }
        });
    }

    // #endregion

    // #region Broadcast

    static get isBroadcasting() {
        return Update._isBroadcasting;
    }

    static set isBroadcasting(isBroadcasting) {
        Update._isBroadcasting = isBroadcasting;
    }

    static broadcast(update) {
        if (this.isBroadcasting) {
            this.queue.enqueue(update);
        } else {
            this._broadcast(update);
        }
    }

    static _broadcast(update) {
        this.isBroadcasting = true;
        $.when(update.broadcast()).done(() => {
            let update = this.queue.dequeue();
            if (update) {
                setTimeout(() => this._broadcast(update), this.renderRate * 1000);
            } else {
                this.isBroadcasting = false;
            }
        });
    }

    broadcast = () => {
        let $dfd = $.Deferred();
        $.when(Update.render(this.html)).done(() =>
            Update.$surface.fadeIn(this.fadeInDuration * 1000, () =>
                setTimeout(() => Update.$surface.fadeOut(this.fadeOutDuration * 1000, () => $dfd.resolve()), this.duration * 1000))
        );

        return $dfd.promise();
    }

    static render(html) {
        let $dfd = $.Deferred(),
            $imgs = Update.$surface.html(html).find('img'),
            imgCount = $imgs.length,
            onLoad = () => {
                imgCount--;
                if (!imgCount) {
                    $dfd.resolve();
                }
            };

        if (imgCount) {
            $imgs.each((i, img) => img.complete ? onLoad() : $(img).on('load', onLoad));
        } else {
            $dfd.resolve();
        }

        return $dfd.promise();
    }

    // #endregion

    constructor(html, {
        duration = 10,
        fadeInDuration = .1,
        fadeOutDuration = .1
    } = {}) {
        this.html = html;
        this.duration = duration;
        this.fadeInDuration = fadeInDuration;
        this.fadeOutDuration = fadeOutDuration;
    }
}

class Queue {
    get items() {
        return this._items || (this._items = []);
    }

    dequeue = () => {
        return this.items.length ? this.items.shift() : null;
    }

    enqueue = (item) => {
        this.items.push(item);
    }
}
