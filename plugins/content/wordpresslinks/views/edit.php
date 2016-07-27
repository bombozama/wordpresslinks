<?php
    // As defined in https://codex.wordpress.org/Function_Reference/get_bookmarks
    $fields = array( 'link_id', 'link_url', 'link_name', 'link_image', 'link_target', 'link_category',
        'link_description', 'link_visible', 'link_owner', 'link_rating', 'link_updated', 'link_rel', 'link_notes',
        'link_rss'
    );
    
    $link_categories = get_terms( 'link_category', [] ) ?: [];
?>
<div class="uk-form uk-form-horizontal" ng-class="vm.name == 'contentCtrl' ? 'uk-width-large-2-3 wk-width-xlarge-1-2' : ''" ng-controller="wordpressCtrl as wp">

    <h3 class="wk-form-heading">{{'Content' | trans}}</h3>

    <div class="uk-form-row">
        <label class="uk-form-label" for="wk-category">{{'Link Categories' | trans}}</label>
        <div class="uk-form-controls">
            <select id="wk-category" class="uk-form-width-large" ng-model="content.data['category']" multiple>
                <?php foreach ( $link_categories as $category ) : ?>
                    <option value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label" for="wk-include">{{'Custom link list:' | trans}}</label>
        <div class="uk-form-controls">
            <input id="wk-include" class="uk-form-width-large" type="text" placeholder="{{'Comma separated list of bookmark ids' | trans}}" ng-model="content.data['include']">
        </div>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label" for="wk-exclude">{{'Exclude these links from list:' | trans}}</label>
        <div class="uk-form-controls">
            <input id="wk-exclude" class="uk-form-width-large" type="text" placeholder="{{'Comma separated list of bookmark ids' | trans}}" ng-model="content.data['exclude']">
        </div>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label" for="wk-number">{{'Limit' | trans}}</label>
        <div class="uk-form-controls">
            <input id="wk-number" class="uk-form-width-large" type="number" placeholder="0 for all items" min="0" step="1" ng-model="content.data['number']">
        </div>
    </div>

    <div class="uk-form-row">
        <label class="uk-form-label" for="wk-order">{{'Order' | trans}}</label>
        <div class="uk-form-controls">
            <select id="wk-order" class="uk-form-width-large" ng-model="content.data['order_by']">
                <option value="name">{{'Default' | trans}}</option>
                <option value="rand">{{'Random' | trans}}</option>
                <option value="link_id">{{'Latest First' | trans}}</option>
                <option value="link_id_asc">{{'Latest Last' | trans}}</option>
                <option value="name_asc">{{'Alphabetical' | trans}}</option>
                <option value="name">{{'Alphabetical Reversed' | trans}}</option>
                <option value="rating_asc">{{'Rating (low to high)' | trans}}</option>
                <option value="rating">{{'Rating (high to low)' | trans}}</option>
                <option value="owner_asc">{{'Author' | trans}}</option>
                <option value="owner">{{'Author Reversed' | trans}}</option>

                <!-- These didn't make sense to me as valid sorting options. Uncomment if you want:
                <option value="url_asc">{{'URL' | trans}}</option>
                <option value="url">{{'URL Reversed' | trans}}</option>
                <option value="length_asc">{{'Length of bookmark name' | trans}}</option>
                <option value="length">{{'Length of bookmark name Reversed' | trans}}</option>
                -->
                
            </select>
        </div>
    </div>
    <h3 class="wk-form-heading uk-margin-large-top">{{'Mapping' | trans}}</h3>
    <div class="uk-form-row">
        <span class="uk-form-label">{{'Fields' | trans}}</span>
        <div class="uk-form-controls">
            <div class="uk-grid uk-grid-small uk-grid-width-1-2">
                <div>
                    <input class="uk-width-1-1" type="text" value="content" disabled>
                </div>
                <div>
                    <select class="uk-width-1-1" ng-model="content.data['content']">
                        <option value="link_name">{{'Name' | trans}}</option>
                        <option value="link_url">{{'URL' | trans}}</option>
                        <option value="link_description">{{'Description' | trans}}</option>
                        <option value="link_notes">{{'Notes' | trans}}</option>
                    </select>
                </div>
            </div>
            <div class="uk-grid uk-grid-small uk-grid-width-1-2" ng-repeat="map in wp.mapping">
                <div>
                    <input class="uk-width-1-1" type="text" ng-model="map.name" placeholder="{{'Field name' | trans}}">
                </div>
                <div class="uk-flex uk-flex-middle">
                    <select class="uk-width-1-1" ng-model="map.field">
                    <?php foreach ( $fields as $field ) : ?>
                        <option value="<?php echo $field; ?>"><?php echo ucfirst( substr( $field, 5 ) ); ?></option>
                    <?php endforeach; ?>
                    </select>
                    <a class="uk-margin-left uk-text-danger" ng-click="wp.deleteMap(map)"><i class="uk-icon-trash-o"></i></a>
                </div>
            </div>
            <p><a class="uk-button" ng-click="wp.addMap()">{{'Add' | trans}}</a></p>
        </div>
    </div>
</div>