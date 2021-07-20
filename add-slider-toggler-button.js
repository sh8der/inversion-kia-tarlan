( function() {
    'use strict';

    tinymce.PluginManager.add( 'flatsome_slider_outside_toggler__plugin', function( editor, url ) {
        editor.addButton( 'flatsome_slider_outside_toggler', {
            text: 'Переключатель слайдера',
            tooltip: 'Сделать управляющим элементом',
            icon: 'code', // @link https://www.tiny.cloud/docs/advanced/editor-icon-identifiers/
            onclick: function() {

                var selectedNode = editor.selection.getNode();
                var selectedText = selectedNode ? selectedNode.innerHTML : editor.selection.getContent();
                var fields = {};
                const nodeActiveClass = 'sh8der-external-flatsome-slider-toggler--active'

                if (selectedNode) {
                    fields.slide_number = selectedNode.dataset.slideId;
                    fields.target_slider_class = selectedNode.dataset.targetSliderClass;
                    fields.active = selectedNode.classList.contains(nodeActiveClass);
                }

                console.log(fields)

                editor.windowManager.open( {
                    title: 'Сделать переключателем',
                    body: [
                        {
                            type: 'textbox',
                            name: 'slide_number',
                            label: 'Номер слайда',
                            value: fields.slide_number || 0
                        },
                        {
                            type: 'textbox',
                            name: 'target_slider_class',
                            label: 'Класс указанный у слайдера',
                            value: fields.target_slider_class || ''
                        },
                        {
                            type: 'checkbox',
                            name: 'make_active',
                            label: 'Активный пункт',
                            value: '',
                            checked: fields.active
                        },
                        {
                            type: 'checkbox',
                            name: 'remove_toggler',
                            label: 'Удалить тригер',
                            value: ''
                        },
                    ],
                    onsubmit: function( e ) {
                        var slide_number = e.data.slide_number;
                        var target_slider_class = e.data.target_slider_class;
                        var make_active = e.data.make_active;
                        var remove_toggler = e.data.remove_toggler;
                        var classList = ['sh8der-external-flatsome-slider-toggler'];
                        var markup = '';
                        if (make_active) classList.push(nodeActiveClass)

                        markup = '<span class="' + classList.join(' ') + '" data-slide-id="' + slide_number + '" data-target-slider-class="' + target_slider_class + '" >' + selectedText + '</span>';
                        if (remove_toggler) markup = selectedText
                        editor.insertContent(markup)
                    }
                } );
            }
        } );

    } );

} )();