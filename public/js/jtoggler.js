;( function( $, window, document, undefined ) {

    "use strict";

        var pluginName = "jtoggler",
            defaults = {
                className: "",
            };

        function Toggler ( element, options ) {
            this.element = element;

            this.settings = $.extend( {}, defaults, options );
            this._defaults = defaults;
            this._name = pluginName;

            this.init();
            this.events();
        }

        $.extend( Toggler.prototype, {
            init: function() {
                var $element = $(this.element);

                if ($element.data('jtmulti-state') != null) {
                    this.generateThreeStateHTML();
                } else {
                    this.generateTwoStateHTML();
                }
            },
            events: function() {
                var $element = $(this.element);
                var instance = this;

                $element.on('change', this, function (event) {
                    if ($element.data('jtlabel')) {
                        if ($element.data('jtlabel-success')) {
                            if ($element.prop('checked')) {
                                $element.next().next().text($element.data('jtlabel-success'));
                            } else {
                                $element.next().next().text($element.data('jtlabel'));
                            }
                        } else {
                            instance.setWarningLabelMessage();
                        }
                    }

                    $(document).trigger('jt:toggled', [event.target]);
                });

                if (!$element.prop('disabled')) {
                    var $control = $element.next('.jtoggler-control');
                    $control
                        .find('.jtoggler-radio')
                        .on('click', this, function (event) {

                            let id = $element.data('id');
                            let statusAction = $element.data('status-action');
                            let status = $control.parent().parent().parent().find('td:nth-child(6)').children();

                            $(this)
                                .parents('.jtoggler-control')
                                .find('.jtoggler-btn-wrapper')
                                .removeClass('is-active');

                            $(this)
                                .parent()
                                .addClass('is-active');
                            $control.find('.jtoggler-btn-wrapper:nth-child(2)').removeClass('is-active');
                            if ($(event.currentTarget).parent().index() === 2) {
                                $control.addClass('is-fully-active');
                                $control.removeClass('is-fully-not-active');
                                statusAction = 1;
                                status.removeClass('alert-danger');
                                status.addClass('alert-success').text('Approved');
                            } else {
                                $control.removeClass('is-fully-active');
                                $control.addClass('is-fully-not-active');
                                statusAction = 0;
                                status.removeClass('alert-success');
                                status.addClass('alert-danger').text('rejected!');
                            }

                            $(document).trigger('jt:toggled:multi', [event.target]);

                            $.ajax({
                                url: "comments/update-status",
                                type: 'POST',
                                data: {
                                    id: id,
                                    status_action: statusAction
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        });
                }
            },
            generateThreeStateHTML: function() {

                var $element = $(this.element);

                if (!$element.hasClass('jqtoggler-inited')) {
                    $element.addClass('jqtoggler-inited');
                    var $wrapper = $('<div />', {
                        class: $.trim("jtoggler-wrapper jtoggler-wrapper-multistate " + this._defaults.className),
                    });
                    var $control = $('<div />', {
                        class: 'jtoggler-control',
                    });
                    var $handle = $('<div />', {
                        class: 'jtoggler-handle',
                    });
                    for (var i = 0; i < 3; i++) {
                        var $label = $('<label />', {
                            class: 'jtoggler-btn-wrapper',
                        });
                        var $btn = $('<input />', {
                            type: 'radio',
                            name: 'options',
                            class: 'jtoggler-radio',
                        });

                        $label.append($btn);
                        $control.prepend($label);
                    }
                    $control.append($handle);
                    $element.wrap($wrapper).after($control);
                    let statusAction = $element.data('status-action');
                    let status = $control.parent().parent().parent().find('td:nth-child(6)').children();

                    if (statusAction === 1) {
                        $control.addClass('is-fully-active');
                        $control.removeClass('is-fully-not-active');
                        $control
                            .find('.jtoggler-btn-wrapper')
                            .addClass('is-active');
                        status.addClass('alert-success').text('Approved');
                    } else if(statusAction === 0) {
                        $control.removeClass('is-fully-active');
                        $control.addClass('is-fully-not-active');
                        $control
                            .find('.jtoggler-btn-wrapper')
                            .removeClass('is-active');
                        status.addClass('alert-danger').text('rejected!');
                    } else {
                        $control.find('.jtoggler-btn-wrapper:nth-child(2)').addClass('is-active default');
                        status.addClass('alert-primary').text('new!');
                    }
                }

            },
            setWarningLabelMessage: function() {
                console.warn('Data attribute "jtlabel-success" is not set');
            },

        } );

        $.fn[ pluginName ] = function( options ) {
            return this.each( function() {
                if ( !$.data( this, "plugin_" + pluginName ) ) {
                    $.data( this, "plugin_" +
                        pluginName, new Toggler( this, options ) );
                }
            } );
        };

} )( jQuery, window, document );


