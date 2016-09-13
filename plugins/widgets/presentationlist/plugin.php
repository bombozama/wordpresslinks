<?php

return array(
    'name' => 'widget/presentationlist',
    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',
    'config' => array(
        'name'  => 'presentationlist',
        'label' => 'Presentation List',
        'core'  => true,
        'icon'  => plugin_dir_path( __FILE__ ) . 'widget.svg',
        'view'  => plugin_dir_path( __FILE__ ) . 'views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'list'              => 'normal',
            'content_align'     => true,
            
            'title_size'        => 'default',
            'title_truncate'    => '',
            'link'              => true,
            'link_color'        => 'muted',

            'link_target'       => false,
            'class'             => ''
        )
    ),

    'events' => array(
        'init.site' => function($event, $app) {
        },
        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('presentationlist.edit', plugin_dir_path( __FILE__ ) . 'views/edit.php', true);
        }
    )
);