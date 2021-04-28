import {
    Update
} from './_update';

export class TableUpdate extends Update {
    static initialize(surface) {
        this.$surface = $(surface);
    }

    static broadcast(update) {
        this.$surface.html(update.html);
    }
}