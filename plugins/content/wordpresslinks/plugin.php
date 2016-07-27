<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

return array(

    'name' => 'content/wordpresslinks',
    'main' => 'YOOtheme\\Widgetkit\\Content\\Type',

    'config' => array(
            'name'  => 'wordpresslinks',
            'label' => 'WordPress Links',
            'icon'  => 'plugins/content/wordpresslinks/content.svg',
            'item'  => array('title', 'content', 'link', 'media'),
            'data'  => array(
                'category' => array(),
                'number'   => 5,
                'order_by' => 'post_date',
                'include'  => '',
                'exclude'  => '',
                'content'  => 'link_name',
            )
    ),

    'items' => function( $items, $content, $app ) {

        $order = explode( '_asc', $content['order_by'] );

        $args  = array(
            'category'  => $content['category'] ? implode( ',', $content['category'] ) : '',
            'orderby'     => isset( $order[0] ) ? $order[0] : 'name',
            'order'       => isset( $order[1] ) ? 'ASC' : 'DESC',
            'limit'       => $content['number'] ?: -1,
            'include'     => $content['include'] ?: '',
            'exclude'     => $content['exclude'] ?: '',
        );

        foreach ( get_bookmarks( $args ) as $link ) {
            $data = array();

            $data['title'] = $link->link_name;
            $data['link'] = $link->link_url;

            // TODO: Override widgetkit target value with link value
            $data['target'] = $link->link_target ?: '_self';

            $data['content'] = $link->{ $content['content'] };

            if ( ! empty( $link->link_image ) )
                $data['media'] = $link->link_image;

            // Links do not support tags. Setting empty array for compatibility with widgetkit
            $data['tags'] = array();

            // Map custom fields in case you want to do anything with it.
            foreach ( (array) $content['mapping'] as $map ) {
                if ( isset( $map['name'] ) && isset( $map['field'] ) ) {
                    $data[ $map['name'] ] = $link->{ $map['field'] };
                }
            }
            $items->add($data);
        }
    },

    'events' => array(
        'init.admin' => function( $event, $app ) {
            $app['scripts']->add( 'widgetkit-wordpresslinks-controller', 'plugins/content/wordpresslinks/assets/controller.js' );
            $app['angular']->addTemplate( 'wordpresslinks.edit', 'plugins/content/wordpresslinks/views/edit.php' );
        },

        'init.site' => function( $event, $app ) {

        },

        'init' => function( $event, $app ) {
            
        }
    )
);