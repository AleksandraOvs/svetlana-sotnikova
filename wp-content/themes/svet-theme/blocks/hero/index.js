(function () {

    const { registerBlockType } = wp.blocks;

    const { __ } = wp.i18n;

    const {
        createElement: el,
        Fragment,
    } = wp.element;

    const {
        RichText,
        MediaUpload,
        MediaUploadCheck,
        InspectorControls,
        URLInput,
    } = wp.blockEditor;

    const {
        PanelBody,
        TextControl,
        Button,
    } = wp.components;


    /*
     * SVG decoration
     */
    function HeroDecoration() {

        return el(
            'svg',
            {
                className: 'hero-v2__decor',
                viewBox: '0 0 1200 160',
                preserveAspectRatio: 'none',
                'aria-hidden': 'true',
            },

            el(
                'g',
                {
                    fill: '#a0000b',
                },

                el('path', {
                    d: 'M80,0 L80,110 C80,120 74,120 74,110 L74,0 Z',
                }),

                el('path', {
                    d: 'M110,0 L110,70 C110,78 105,78 105,70 L105,0 Z',
                }),

                el('path', {
                    d: 'M140,0 L140,140 C140,150 134,150 134,140 L134,0 Z',
                }),

                el('path', {
                    d: 'M320,0 L320,90 C320,100 314,100 314,90 L314,0 Z',
                }),

                el('path', {
                    d: 'M350,0 L350,40 C350,48 345,48 345,40 L345,0 Z',
                }),

                el('path', {
                    d: 'M600,0 L600,130 C600,140 594,140 594,130 L594,0 Z',
                }),

                el('path', {
                    d: 'M630,0 L630,60 C630,68 625,68 625,60 L625,0 Z',
                }),

                el('path', {
                    d: 'M920,0 L920,110 C920,120 914,120 914,110 L914,0 Z',
                }),

                el('path', {
                    d: 'M950,0 L950,50 C950,58 945,58 945,50 L945,0 Z',
                }),

                el('path', {
                    d: 'M1080,0 L1080,95 C1080,105 1074,105 1074,95 L1074,0 Z',
                }),

                el('path', {
                    d: 'M1110,0 L1110,30 C1110,38 1105,38 1105,30 L1105,0 Z',
                })
            )
        );
    }


    registerBlockType('svet-theme/hero', {

        edit: function (props) {

            const attributes = props.attributes;
            const setAttributes = props.setAttributes;

            const {
                title,
                titleAccent,
                description,

                buttonPrimaryText,
                buttonPrimaryUrl,

                buttonSecondaryText,
                buttonSecondaryUrl,

                numbers,

                backgroundId,
                backgroundUrl,
                backgroundAlt,
            } = attributes;


            /*
             * Numbers
             */

            function updateNumber(index, field, value) {

                const updated = numbers.slice();

                updated[index] = Object.assign(
                    {},
                    updated[index],
                    {
                        [field]: value,
                    }
                );

                setAttributes({
                    numbers: updated,
                });
            }


            function addNumber() {

                setAttributes({
                    numbers: numbers.concat([
                        {
                            value: '0',
                            suffix: '',
                            label: 'Показатель',
                        },
                    ]),
                });
            }


            function removeNumber(index) {

                setAttributes({
                    numbers: numbers.filter(function (number, i) {
                        return i !== index;
                    }),
                });
            }


            /*
             * Inspector
             */

            const inspector = el(
                InspectorControls,
                null,

                /*
                 * Button 1
                 */

                el(
                    PanelBody,
                    {
                        title: __('Кнопка 1', 'svet-theme'),
                        initialOpen: false,
                    },

                    el(TextControl, {
                        label: __('Текст', 'svet-theme'),
                        value: buttonPrimaryText,
                        onChange: function (value) {
                            setAttributes({
                                buttonPrimaryText: value,
                            });
                        },
                    }),

                    el(URLInput, {
                        label: __('Ссылка', 'svet-theme'),
                        value: buttonPrimaryUrl,
                        onChange: function (value) {
                            setAttributes({
                                buttonPrimaryUrl: value,
                            });
                        },
                    })
                ),


                /*
                 * Button 2
                 */

                el(
                    PanelBody,
                    {
                        title: __('Кнопка 2', 'svet-theme'),
                        initialOpen: false,
                    },

                    el(TextControl, {
                        label: __('Текст', 'svet-theme'),
                        value: buttonSecondaryText,
                        onChange: function (value) {
                            setAttributes({
                                buttonSecondaryText: value,
                            });
                        },
                    }),

                    el(URLInput, {
                        label: __('Ссылка', 'svet-theme'),
                        value: buttonSecondaryUrl,
                        onChange: function (value) {
                            setAttributes({
                                buttonSecondaryUrl: value,
                            });
                        },
                    })
                ),


                /*
                 * Numbers
                 */

                el(
                    PanelBody,
                    {
                        title: __('Показатели', 'svet-theme'),
                        initialOpen: false,
                    },

                    numbers.map(function (number, index) {

                        return el(
                            'div',
                            {
                                key: index,
                                className: 'hero-number-control',
                            },

                            el(TextControl, {
                                label: __('Значение', 'svet-theme'),
                                value: number.value,

                                onChange: function (value) {
                                    updateNumber(
                                        index,
                                        'value',
                                        value
                                    );
                                },
                            }),

                            el(TextControl, {
                                label: __('Суффикс', 'svet-theme'),
                                value: number.suffix,

                                onChange: function (value) {
                                    updateNumber(
                                        index,
                                        'suffix',
                                        value
                                    );
                                },
                            }),

                            el(TextControl, {
                                label: __('Подпись', 'svet-theme'),
                                value: number.label,

                                onChange: function (value) {
                                    updateNumber(
                                        index,
                                        'label',
                                        value
                                    );
                                },
                            }),

                            el(
                                Button,
                                {
                                    isDestructive: true,

                                    onClick: function () {
                                        removeNumber(index);
                                    },
                                },

                                __('Удалить', 'svet-theme')
                            )
                        );
                    }),

                    el(
                        Button,
                        {
                            variant: 'secondary',
                            onClick: addNumber,
                        },

                        __('Добавить показатель', 'svet-theme')
                    )
                )
            );


            /*
             * Title
             */

            const titleElement = el(
                RichText,
                {
                    tagName: 'h1',
                    className: 'hero__title',
                    value: title,

                    onChange: function (value) {
                        setAttributes({
                            title: value,
                        });
                    },

                    placeholder: __('Заголовок', 'svet-theme'),
                }
            );


            /*
             * Accent
             */

            const accentElement = el(
                RichText,
                {
                    tagName: 'span',
                    className: 'hero__title-accent',
                    value: titleAccent,

                    onChange: function (value) {
                        setAttributes({
                            titleAccent: value,
                        });
                    },

                    placeholder: __('Акцент', 'svet-theme'),
                }
            );


            /*
             * Description
             */

            const descriptionElement = el(
                RichText,
                {
                    tagName: 'div',
                    className: 'hero__description',
                    value: description,

                    onChange: function (value) {
                        setAttributes({
                            description: value,
                        });
                    },

                    placeholder: __('Описание', 'svet-theme'),
                }
            );


            /*
             * Buttons
             */

            const buttonsElement = el(
                'div',
                {
                    className: 'hero-buttons',
                },

                el(
                    'div',
                    {
                        className: 'button',
                    },

                    el(RichText, {
                        tagName: 'span',
                        value: buttonPrimaryText,

                        onChange: function (value) {
                            setAttributes({
                                buttonPrimaryText: value,
                            });
                        },
                    })
                ),

                el(
                    'div',
                    {
                        className: 'button button-outline',
                    },

                    el(RichText, {
                        tagName: 'span',
                        value: buttonSecondaryText,

                        onChange: function (value) {
                            setAttributes({
                                buttonSecondaryText: value,
                            });
                        },
                    })
                )
            );


            /*
             * Numbers
             */

            const numbersElement = el(
                'ul',
                {
                    className: 'hero-nums',
                },

                numbers.map(function (number, index) {

                    return el(
                        'li',
                        {
                            className: 'hero-num',
                            key: index,
                        },

                        el(
                            'div',
                            {
                                className: 'about-num__value',
                            },

                            el(
                                'span',
                                null,
                                number.value
                            ),

                            number.suffix
                        ),

                        el(
                            'span',
                            null,
                            number.label
                        )
                    );
                })
            );


            /*
             * Background image
             */

            const imageElement = el(
                'div',
                {
                    className: 'hero__image',
                },

                el(
                    MediaUploadCheck,
                    null,

                    el(MediaUpload, {

                        onSelect: function (media) {

                            setAttributes({
                                backgroundId: media.id,
                                backgroundUrl: media.url,
                                backgroundAlt: media.alt || '',
                            });
                        },

                        allowedTypes: ['image'],

                        value: backgroundId,

                        render: function (renderProps) {

                            const open = renderProps.open;

                            if (backgroundUrl) {

                                return el('img', {
                                    src: backgroundUrl,
                                    alt: backgroundAlt,
                                    onClick: open,
                                });

                            }

                            return el(
                                Button,
                                {
                                    variant: 'secondary',
                                    onClick: open,
                                },

                                __('Выбрать изображение', 'svet-theme')
                            );
                        },
                    })
                )
            );


            /*
             * Hero
             */

            const hero = el(
                'section',
                {
                    className: 'hero hero-v2',
                },

                el(HeroDecoration),

                el(
                    'div',
                    {
                        className: 'hero__inner',
                    },

                    el(
                        'div',
                        {
                            className: 'hero__inner__content',
                        },

                        el(
                            'div',
                            {
                                className: 'hero-title',
                            },

                            titleElement,
                            accentElement,
                            descriptionElement
                        ),

                        buttonsElement,

                        numbersElement
                    ),

                    imageElement
                )
            );


            return el(
                Fragment,
                null,

                inspector,
                hero
            );
        },


        /*
         * SAVE
         */

        save: function (props) {

            const attributes = props.attributes;

            const {
                title,
                titleAccent,
                description,

                buttonPrimaryText,
                buttonPrimaryUrl,

                buttonSecondaryText,
                buttonSecondaryUrl,

                numbers,

                backgroundUrl,
                backgroundAlt,
            } = attributes;


            return el(
                'section',
                {
                    className: 'hero hero-v2',
                },

                el(HeroDecoration),

                el(
                    'div',
                    {
                        className: 'hero__inner',
                    },

                    el(
                        'div',
                        {
                            className: 'hero__inner__content',
                        },

                        el(
                            'div',
                            {
                                className: 'hero-title',
                            },

                            el(
                                'h1',
                                {
                                    className: 'hero__title',
                                    'data-scroll-animation': 'brightness',
                                },

                                title,

                                titleAccent
                                    ? el(
                                        'span',
                                        {
                                            className: 'hero__title-accent',
                                        },
                                        titleAccent
                                    )
                                    : null
                            ),

                            description
                                ? el(
                                    'div',
                                    {
                                        className: 'hero__description',
                                        'data-scroll-animation': 'fade-up',
                                    },
                                    description
                                )
                                : null
                        ),


                        el(
                            'div',
                            {
                                className: 'hero-buttons',
                            },

                            buttonPrimaryText
                                ? el(
                                    'a',
                                    {
                                        className: 'button',
                                        href: buttonPrimaryUrl || '#',
                                    },
                                    buttonPrimaryText
                                )
                                : null,

                            buttonSecondaryText
                                ? el(
                                    'a',
                                    {
                                        className: 'button button-outline',
                                        href: buttonSecondaryUrl || '#',
                                    },
                                    buttonSecondaryText
                                )
                                : null
                        ),


                        numbers.length
                            ? el(
                                'ul',
                                {
                                    className: 'hero-nums',
                                },

                                numbers.map(function (number, index) {

                                    return el(
                                        'li',
                                        {
                                            className: 'hero-num',
                                            'data-scroll-animation': 'fade-up',
                                            key: index,
                                        },

                                        el(
                                            'div',
                                            {
                                                className: 'about-num__value',
                                            },

                                            el(
                                                'span',
                                                {
                                                    className: 'js-anim-numbers',
                                                    'data-number': number.value,
                                                },
                                                '0'
                                            ),

                                            number.suffix
                                        ),

                                        el(
                                            'span',
                                            null,
                                            number.label
                                        )
                                    );
                                })
                            )
                            : null
                    ),

                    backgroundUrl
                        ? el(
                            'div',
                            {
                                className: 'hero__image',
                            },

                            el('img', {
                                src: backgroundUrl,
                                alt: backgroundAlt || '',
                                'data-scroll-animation': 'brightness',
                            })
                        )
                        : null
                )
            );
        },
    });

})();