<?php

use YOOtheme\Widgetkit\Content\Content;

$list = 'uk-list';
switch( $settings['list'] ) {
    case 'normal':
        $list = '';
        break;
    case 'line':
    case 'striped':
    case 'space':
        $list .= ' uk-list-' . $settings['list'];
        break;
}

$content_align  = $settings['content_align'] ? 'uk-flex-middle' : '';
$link_target = ( $settings['link_target'] ) ? ' target="_blank"' : '';

echo '<ul class="' . $list . ' ' . $settings['class'] . '">';

foreach ($items as $i => $item) {
    # Data
    $title = $item['content'];

    if( $settings['title_truncate'] ) {
        $title = Content::truncate( $title, $settings['title_truncate'] );
    }

    switch( $settings['title_size'] ) {
        case 'h1':
            $title = '<h1 class="uk-margin-remove">' . $title . '</h1>';
            break;
        case 'h1':
            $title = '<h2 class="uk-margin-remove">' . $title . '</h2>';
            break;
        case 'h3':
            $title = '<h3 class="uk-margin-remove">' . $title . '</h3>';
            break;
    }

    $link_color = ( 'link' != $settings['link_color'] ) ? 'uk-link-' . $settings['link_color'] : '';

    echo '<li>';

    if( $item['link'] && $settings['link'] ){
        echo '<a class="' . $link_color . '" href="' . $item->escape('link') . '"' . $link_target . '>' . $title . '</a>';
    } else {
        echo $title;
    }

    if ( ! empty( $item['author'] ) ) {
        echo '<br>' . $item['author'];
    }
    echo '</li>';
}
echo '</ul>';
