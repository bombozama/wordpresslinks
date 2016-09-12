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
            'icon'  => plugin_dir_path( __FILE__ ) . 'content.svg',
            'item'  => array('title', 'content', 'link', 'media'),
            'data'  => array(
                'category' => array(),
                'number'   => 5,
                'order_by' => 'post_date',
                'include'  => '',
                'exclude'  => '',
                'content'  => 'link_name',
                'operator' => 0,
            )
    ),

    'items' => function( $items, $content, $app ) {

        $order = explode( '_asc', $content['order_by'] );
        $args  = array(
            'category'    => $content['category'] ? implode( ',', $content['category'] ) : '',
            'orderby'     => isset( $order[0] ) ? $order[0] : 'name',
            'order'       => isset( $order[1] ) ? 'ASC' : 'DESC',
            'limit'       => $content['number'] ?: -1,
        );

        if ( ! empty( $content['include'] ) ){
            $args['include'] = $content['include'];
        }

        if ( ! empty( $content['exclude'] ) ){
            $args['exclude'] = $content['exclude'];
        }

        if( intval( $content['operator'] ) ) {
            # Selected AND operator... make a list of ids and pass it to $args
            $i = 0;
            foreach( $content['category'] as $cat ) {
                $temporaryItems = wp_list_pluck( get_bookmarks( array( 'category' => $cat ) ) , 'link_id' );
                if( 0 == $i++ ) {
                    $ids = $temporaryItems;
                } else {
                    $ids = array_intersect( $ids, $temporaryItems );
                }
            }
            $args['category'] = '';
            $args['include'] = implode( ',', $ids );
        }

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
            $app['angular']->addTemplate( 'wordpresslinks.edit', plugin_dir_path( __FILE__ ) . 'views/edit.php');
        },

        'init.site' => function( $event, $app ) {

        },

        'init' => function( $event, $app ) {
            
        }
    )
);