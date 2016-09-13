<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">
        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>
    </div>
    <div class="uk-width-medium-3-4">
        <ul id="nav-content" class="uk-switcher">
            <li>
                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>
                <div class="uk-form-row">
                    <label class="uk-form-label">{{'Display' | trans}}</label>
                    <div class="uk-form-controls">
                        <label>{{'Please map fields for "content" and "author"' | trans}}</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-title-size">{{'Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="default">Default</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                        </select>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label">{{'Truncate' | trans}}</label>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-mini" type="text" ng-model="widget.data['title_truncate']"> {{'Max. characters' | trans}}</label>
                    </div>
                </div>
                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-link-style">{{'Color' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-form-width-medium" ng-model="widget.data['link_color']">
                            <option value="link">{{'Link' | trans}}</option>
                            <option value="muted">{{'Muted' | trans}}</option>
                            <option value="reset">{{'Same as text' | trans}}</option>
                        </select>
                    </div>
                </div>
            </li>
            <li>
                <h3 class="wk-form-heading">{{'General' | trans}}</h3>
                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>