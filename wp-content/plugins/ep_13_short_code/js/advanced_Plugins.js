jQuery(document).ready(function ($) {
    tinymce.PluginManager.add('ep_advanced_Plugins', function (editor, url) {
        editor.addButton('ep_advanced_Plugins', {
            text: 'TopMenu',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'SubMenu 1',
                    onclick: function () {
                        editor.insertContent('this is content');
                    }
                }, {
                    text: 'SubMenu 2',
                    menu: [
                        {
                            text: 'Sub SubMenu 1',
                            onclick: function () {
                                editor.windowManager.open({
                                    title: 'پست های اخیر',
                                    body: [
                                        {
                                            type: 'textbox',
                                            label: 'تعداد پست',
                                            name: 'ep_post_count',
                                            value: 5
                                        },
                                        {
                                            type: 'checkbox',
                                            label: 'نمایش تاریخ',
                                            name: 'ep_post_date',
                                            value: true
                                        },
                                        {
                                            type: 'textbox',
                                            label: 'testing textarea',
                                            name: 'testarea',
                                            multiline: true,
                                            minHeight:500,
                                            minWidth:600
                                        }
                                    ],
                                    onsubmit: function (e) {
                                        console.log(editor.selection.getContent());
                                        //زمانی که پنجره جدید اوکی میشود توسط این تابع اطلاعات ارسال میشوند
                                    }
                                });

                            }
                        }
                    ]
                }

            ]
        });
    });

});