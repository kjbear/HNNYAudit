@extends('index')

@section('content')
  <nav class="navbar navbar-pf-vertical">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="/" class="navbar-brand">
      <!--<img class="navbar-brand-icon" src="/assets/img/logo-alt.svg" alt=""/><img class="navbar-brand-name" src="/assets/img/brand-alt.svg" alt="PatternFly Enterprise Application" />-->
      <span style="color: #66a3ff; font-weight: 600; font-size: 18pt; font-stretch: condensed;">Health</span><span style="color: #cc0000; font-style: italic; font-size: 18pt; ">Now</span>  -  Enterprise Monitoring System
    </a>
  </div>
  <nav class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right navbar-iconic navbar-utility">
      
      <li class="dropdown">
        <a class="dropdown-toggle nav-item-iconic" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span title="Help" class="fa pficon-help"></span>
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li><a href="#">Help</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </li>
    </ul>
  </nav>
   
  <div class="drawer-pf hide drawer-pf-notifications-non-clickable">
  <div class="drawer-pf-title">
    <a class="drawer-pf-toggle-expand fa fa-angle-double-left hidden-xs"></a>
    <a  class="drawer-pf-close pficon pficon-close"></a>
    <h3 class="text-center">Notifications Drawer</h3>
  </div>
  <div class="panel-group" id="notification-drawer-accordion">
    <div class="panel panel-default">
      <div class="panel-heading" data-component="collapse-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#notification-drawer-accordion" href="#fixedCollapseOne">
            Notification Tab 1
          </a>
        </h4>
        <span class="panel-counter">5 New Events</span>
      </div>
      <div id="fixedCollapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="drawer-pf-notification unread"> 
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight11" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight11">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight21" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight21">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight31" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight31">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight41" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight41">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

        </div>
        <div class="blank-slate-pf hidden">
          <div class="blank-slate-pf-icon">
            <span class="pficon-info"></span>
          </div>
          <h1>There are no notifications to display.</h1>
        </div>
        <div class="drawer-pf-action">
          <div class="drawer-pf-action-link" data-toggle="mark-all-read">
            <button class="btn btn-link">Mark All Read</button>
          </div>
          <div class="drawer-pf-action-link" data-toggle="clear-all">
            <button class="btn btn-link">
              <span class="pficon pficon-close"></span>
              Clear All
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" data-component="collapse-heading">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#notification-drawer-accordion" href="#fixedCollapseTwo">
            Notification Tab 2
          </a>
        </h4>
        <span class="panel-counter">5 New Events</span>
      </div>
      <div id="fixedCollapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight12">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight22" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight22">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight32" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight32">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight42" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight42">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight13" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight13">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight23" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight23">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight33" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight33">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight43" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight43">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight14" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight14">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight24" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight24">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight34" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight34">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight44" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight44">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

          <div class="drawer-pf-loading text-center">
            <span class="spinner spinner-xs spinner-inline"></span> Loading More
          </div>
        </div>
        <div class="blank-slate-pf hidden">
          <div class="blank-slate-pf-icon">
            <span class="pficon-info"></span>
          </div>
          <h1>There are no notifications to display.</h1>
        </div>
        <div class="drawer-pf-action">
          <div class="drawer-pf-action-link" data-toggle="mark-all-read">
            <button class="btn btn-link">Mark All Read</button>
          </div>
          <div class="drawer-pf-action-link" data-toggle="clear-all">
            <button class="btn btn-link">
              <span class="pficon pficon-close"></span>
              Clear All
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" data-component="collapse-heading">
        <h4 class="panel-title">
          <a class="collapsed" data-toggle="collapse" data-parent="#notification-drawer-accordion" href="#fixedCollapseThree">
            Notification Tab 3
          </a>
        </h4>
        <span class="panel-counter">5 New Events</span>
      </div>
      <div id="fixedCollapseThree" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight15" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight15">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight25" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight25">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight35" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight35">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight45" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight45">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight16" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight16">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight26" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight26">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight36" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight36">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight46" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight46">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

          <div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight17" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight17">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-info pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">A New Event! Huzzah! Bold!</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification unread">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight27" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight27">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-ok pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight37" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight37">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-warning-triangle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification that is really long to see how it reacts on smaller screens sizes.</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>
<div class="drawer-pf-notification">
  
  <div class="dropdown pull-right dropdown-kebab-pf">
  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownKebabRight47" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="fa fa-ellipsis-v"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownKebabRight47">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another Action</a></li>
    <li><a href="#">Something Else Here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated Link</a></li>
  </ul>
</div>

  <span class="pficon pficon-error-circle-o pull-left"></span>
  <div class="drawer-pf-notification-content">
    <span class="drawer-pf-notification-message">Another Event Notification</span>
    <div class="drawer-pf-notification-info">
      <span class="date">3/31/16</span>
      <span class="time">12:12:44 PM</span>
    </div>
  </div>
</div>

        </div>
        <div class="blank-slate-pf hidden">
          <div class="blank-slate-pf-icon">
            <span class="pficon-info"></span>
          </div>
          <h1>There are no notifications to display.</h1>
        </div>
        <div class="drawer-pf-action">
          <div class="drawer-pf-action-link" data-toggle="mark-all-read">
            <button class="btn btn-link">Mark All Read</button>
          </div>
          <div class="drawer-pf-action-link" data-toggle="clear-all">
            <button class="btn btn-link">
              <span class="pficon pficon-close"></span>
              Clear All
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
</nav> <!--/.navbar-->


<div class="nav-pf-vertical nav-pf-vertical-with-sub-menus">
  <ul class="list-group">
    <li id="nav-dashboard" class="list-group-item">
      <a href="/">
        <span class="fa fa-dashboard" data-toggle="tooltip" title="Dashboard"></span>
        <span class="list-group-item-value">Dashboard</span>
      </a>
    </li>
    <li id="nav-audit" class="list-group-item">
      <a href="/audit">
        <span class="fa fa-balance-scale" data-toggle="tooltip" title="Audit"></span>
        <span class="list-group-item-value">Audit</span>
        
      </a>
    </li>
    <li id="nav-ciexplorer" class="list-group-item">
      <a href="/ciexplorer">
        <span class="fa fa-search" data-toggle="tooltip" title="CI Explorer"></span>
        <span class="list-group-item-value">CI Explorer</span>
        
      </a>
    </li>
    <li id="nav-documentation" class="list-group-item">
      <a href="/doc">
        <span class="fa fa-book" data-toggle="tooltip" title="Documentation"></span>
        <span class="list-group-item-value">Documentation</span>
        
      </a>
    </li>
    <li id="nav-settings" class="list-group-item">
      <a href="/settings">
        <span class="fa fa-cogs" data-toggle="tooltip" title="Settings"></span>
        <span class="list-group-item-value">Settings</span>
        
      </a>
    </li>
    <!--<li class="list-group-item active " data-target="#ipsum-secondary">
      <a href="#0">
        <span class="fa fa-space-shuttle" data-toggle="tooltip" title="Ipsum"></span>
        <span class="list-group-item-value">Ipsum</span>
      </a>
      
    </li>
    <li class="list-group-item " data-target="#amet-secondary">
      <a href="#0">
        <span class="fa fa-paper-plane" data-toggle="tooltip" title="Amet"></span>
        <span class="list-group-item-value">Amet</span>
      </a>
      
    </li>
    <li class="list-group-item">
      <a href="#0">
        <span class="fa fa-graduation-cap" data-toggle="tooltip" title="Adipscing"></span>
        <span class="list-group-item-value">Adipscing</span>
      </a>
    </li>
    <li class="list-group-item">
      <a href="#0">
        <span class="fa fa-gamepad" data-toggle="tooltip" title="Lorem"></span>
        <span class="list-group-item-value">Lorem</span>
      </a>
    </li>
    <li class="list-group-item secondary-nav-item-pf mobile-nav-item-pf visible-xs-block">
      <a href="#0">
        <span class="pficon pficon-user" data-toggle="tooltip" title="" data-original-title="User"></span>
        <span class="list-group-item-value">User</span>
      </a>
      <div id="user-secondary" class="nav-pf-secondary-nav">
        <div class="nav-item-pf-header">
          <a href="#0" class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a>
          <span>User</span>
        </div>

        <ul class="list-group">
          <li class="list-group-item">
            <a href="#0">
              <span class="list-group-item-value">Preferences</span>
            </a>
          </li>

          <li class="list-group-item">
            <a href="#0">
              <span class="list-group-item-value">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="list-group-item secondary-nav-item-pf mobile-nav-item-pf visible-xs-block" data-target="#amet-secondary">
      <a href="#0">
        <span class="pficon pficon-help" data-toggle="tooltip" title="" data-original-title="Help"></span>
        <span class="list-group-item-value">Help</span>
      </a>
      <div id="help-secondary" class="nav-pf-secondary-nav">
        <div class="nav-item-pf-header">
          <a href="#0" class="secondary-collapse-toggle-pf" data-toggle="collapse-secondary-nav"></a>
          <span>Help</span>
        </div>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="#0">
              <span class="list-group-item-value">Help</span>
            </a>
          </li>
          <li class="list-group-item">
            <a href="#0">
              <span class="list-group-item-value">About</span>
            </a>
          </li>
        </ul>
      </div>
    </li>

  </ul>
-->
</div>
<div class="container-fluid container-cards-pf container-pf-nav-pf-vertical">
  @yield('main')

</div>
      
@endsection

@push('end-scripts')
$(document).ready(function() {
    // Initialize to unread notifications
    // TODO: add badge for unread notifications

    // Show/Hide Notifications Drawer
    $('.drawer-pf-trigger').click(function() {
      var $drawer = $('.drawer-pf');

      $(this).toggleClass('open');
      if ($drawer.hasClass('hide')) {
        $drawer.removeClass('hide');
        setTimeout(function () {
          if (window.dispatchEvent) {
            window.dispatchEvent(new Event('resize'));
          }
          // Special case for IE
          if ($(document).fireEvent) {
            $(document).fireEvent('onresize');
          }
        }, 100);
      } else {
        $drawer.addClass('hide');
      }
      // Special case, close navigation menu in mobile mode
     if ($('.container-pf-nav-pf-vertical').hasClass('hidden-nav')) {
       $('.nav-pf-vertical').removeClass('show-mobile-nav');
     }
    });
    $('.drawer-pf-close').click(function() {
      var $drawer = $('.drawer-pf');

      $('.drawer-pf-trigger').removeClass('open');
      $drawer.addClass('hide');
    });
    $('.drawer-pf-toggle-expand').click(function() {
      var $drawer = $('.drawer-pf');
      var $drawerNotifications = $drawer.find('.drawer-pf-notification');

      if ($drawer.hasClass('drawer-pf-expanded')) {
        $drawer.removeClass('drawer-pf-expanded');
        $drawerNotifications.removeClass('expanded-notification');
      } else {
        $drawer.addClass('drawer-pf-expanded');
        $drawerNotifications.addClass('expanded-notification');
      }
    });

    // Mark All Read / Clear All
    $('.panel-collapse').each(function (index, panel) {
      var $panel = $(panel);
      var unreadCount = $panel.find('.drawer-pf-notification.unread').length;
      $(panel.parentElement).find('.panel-counter').text(unreadCount + ' New Event' + (unreadCount !== 1 ? 's' : ''));

      if ($('.drawer-pf .panel-collapse .unread').length === 0) {
        // TODO: remove badge for unread indicator
      }

      $panel.on('click', '.drawer-pf-action [data-toggle="mark-all-read"] .btn', function() {
        $panel.find('.unread').removeClass('unread');
        $panel.find('.drawer-pf-action [data-toggle="mark-all-read"]').remove();
        $(panel.parentElement).find('.panel-counter').text('0 New Events');
        if ($('.drawer-pf .panel-collapse .unread').length === 0) {
          $('.drawer-pf-trigger').removeClass('unread');
        }
      });
      $panel.on('click', '.drawer-pf-action [data-toggle="clear-all"] .btn', function() {
        $panel.find('.panel-body .drawer-pf-notification').remove();
        $panel.find('.drawer-pf-action').remove();
        $panel.find('.blank-slate-pf').removeClass('hidden');
        $panel.find('.drawer-pf-loading').addClass('hidden');
        $(panel.parentElement).find('.panel-counter').text('0 New Events');
        if ($('.drawer-pf .panel-collapse .unread').length === 0) {
          // TODO: remove badge for unread indicator
        }
      });

      $panel.find('.drawer-pf-notification').each(function (index, notification) {
        var $notification = $(notification);
        $notification.on('click', '.drawer-pf-notification-content', function() {
          $notification.removeClass('unread');
          var unreadCount = $panel.find('.drawer-pf-notification.unread').length;
          $(panel.parentElement).find('.panel-counter').text(unreadCount + ' New Event' + (unreadCount !== 1 ? 's' : ''));
          if (unreadCount === 0) {
            $panel.find('.drawer-pf-action [data-toggle="mark-all-read"]').remove();
            if ($('.drawer-pf .panel-collapse .unread').length === 0) {
              // TODO: remove badge for unread indicator
            }
          }
        });
      });
    });

    $('#notification-drawer-accordion').initCollapseHeights('.panel-body');
  });
          

  $(document).ready(function() {
    // matchHeight the contents of each .card-pf and then the .card-pf itself
    $(".row-cards-pf > [class*='col'] > .card-pf .card-pf-title").matchHeight();
    $(".row-cards-pf > [class*='col'] > .card-pf > .card-pf-body").matchHeight();
    $(".row-cards-pf > [class*='col'] > .card-pf > .card-pf-footer").matchHeight();
    $(".row-cards-pf > [class*='col'] > .card-pf").matchHeight();

    // Initialize the vertical navigation
    $().setupVerticalNavigation(true);
  });
@endpush
