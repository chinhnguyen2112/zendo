var App=function(){var $lHtml,$lBody,$lPage,$lSidebar,$lSidebarScroll,$lSideOverlay,$lSideOverlayScroll,$lHeader,$lMain,$lFooter;var uiInit=function(){$lHtml=jQuery('html');$lBody=jQuery('body');$lPage=jQuery('#page-container');$lSidebar=jQuery('#sidebar');$lSidebarScroll=jQuery('#sidebar-scroll');$lSideOverlay=jQuery('#side-overlay');$lSideOverlayScroll=jQuery('#side-overlay-scroll');$lHeader=jQuery('#header-navbar');$lMain=jQuery('#main-container');$lFooter=jQuery('#page-footer');jQuery('[data-toggle="tooltip"], .js-tooltip').tooltip({container:'body',animation:false});jQuery('[data-toggle="popover"], .js-popover').popover({container:'body',animation:true,trigger:'hover'});jQuery('[data-toggle="tabs"] a, .js-tabs a').click(function(e){e.preventDefault();jQuery(this).tab('show');});jQuery('.form-control').placeholder();};var uiLayout=function(){var $resizeTimeout;if($lMain.length){uiHandleMain();jQuery(window).on('resize orientationchange',function(){clearTimeout($resizeTimeout);$resizeTimeout=setTimeout(function(){uiHandleMain();},150);});}uiHandleScroll('init');if($lPage.hasClass('header-navbar-fixed')&&$lPage.hasClass('header-navbar-transparent')){jQuery(window).on('scroll',function(){if(jQuery(this).scrollTop()>20){$lPage.addClass('header-navbar-scroll');}else{$lPage.removeClass('header-navbar-scroll');}});}jQuery('[data-toggle="layout"]').on('click',function(){var $btn=jQuery(this);uiLayoutApi($btn.data('action'));if($lHtml.hasClass('no-focus')){$btn.blur();}});};var uiHandleMain=function(){var $hWindow=jQuery(window).height();var $hHeader=$lHeader.outerHeight();var $hFooter=$lFooter.outerHeight();if($lPage.hasClass('header-navbar-fixed')){$lMain.css('min-height',$hWindow-$hFooter);}else{$lMain.css('min-height',$hWindow-($hHeader+$hFooter));}};var uiHandleScroll=function($mode){var $windowW=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;if($mode==='init'){uiHandleScroll();var $sScrollTimeout;jQuery(window).on('resize orientationchange',function(){clearTimeout($sScrollTimeout);$sScrollTimeout=setTimeout(function(){uiHandleScroll();},150);});}else{if($windowW>991&&$lPage.hasClass('side-scroll')){jQuery($lSidebar).scrollLock('disable');jQuery($lSideOverlay).scrollLock('disable');if($lSidebarScroll.length&&(!$lSidebarScroll.parent('.slimScrollDiv').length)){$lSidebarScroll.slimScroll({height:$lSidebar.outerHeight(),color:'#fff',size:'5px',opacity:.35,wheelStep:15,distance:'2px',railVisible:false,railOpacity:1});}else{$lSidebarScroll.add($lSidebarScroll.parent()).css('height',$lSidebar.outerHeight());}if($lSideOverlayScroll.length&&(!$lSideOverlayScroll.parent('.slimScrollDiv').length)){$lSideOverlayScroll.slimScroll({height:$lSideOverlay.outerHeight(),color:'#000',size:'5px',opacity:.35,wheelStep:15,distance:'2px',railVisible:false,railOpacity:1});}else{$lSideOverlayScroll.add($lSideOverlayScroll.parent()).css('height',$lSideOverlay.outerHeight());}}else{jQuery($lSidebar).scrollLock('enable');jQuery($lSideOverlay).scrollLock('enable');if($lSidebarScroll.length&&$lSidebarScroll.parent('.slimScrollDiv').length){$lSidebarScroll.slimScroll({destroy:true});$lSidebarScroll.attr('style','');}if($lSideOverlayScroll.length&&$lSideOverlayScroll.parent('.slimScrollDiv').length){$lSideOverlayScroll.slimScroll({destroy:true});$lSideOverlayScroll.attr('style','');}}}};var uiLayoutApi=function($mode){var $windowW=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;switch($mode){case'sidebar_pos_toggle':$lPage.toggleClass('sidebar-l sidebar-r');break;case'sidebar_pos_left':$lPage.removeClass('sidebar-r').addClass('sidebar-l');break;case'sidebar_pos_right':$lPage.removeClass('sidebar-l').addClass('sidebar-r');break;case'sidebar_toggle':if($windowW>991){$lPage.toggleClass('sidebar-o');}else{$lPage.toggleClass('sidebar-o-xs');}break;case'sidebar_open':if($windowW>991){$lPage.addClass('sidebar-o');}else{$lPage.addClass('sidebar-o-xs');}break;case'sidebar_close':if($windowW>991){$lPage.removeClass('sidebar-o');}else{$lPage.removeClass('sidebar-o-xs');}break;case'sidebar_mini_toggle':if($windowW>991){$lPage.toggleClass('sidebar-mini');}break;case'sidebar_mini_on':if($windowW>991){$lPage.addClass('sidebar-mini');}break;case'sidebar_mini_off':if($windowW>991){$lPage.removeClass('sidebar-mini');}break;case'side_overlay_toggle':$lPage.toggleClass('side-overlay-o');break;case'side_overlay_open':$lPage.addClass('side-overlay-o');break;case'side_overlay_close':$lPage.removeClass('side-overlay-o');break;case'side_overlay_hoverable_toggle':$lPage.toggleClass('side-overlay-hover');break;case'side_overlay_hoverable_on':$lPage.addClass('side-overlay-hover');break;case'side_overlay_hoverable_off':$lPage.removeClass('side-overlay-hover');break;case'header_fixed_toggle':$lPage.toggleClass('header-navbar-fixed');break;case'header_fixed_on':$lPage.addClass('header-navbar-fixed');break;case'header_fixed_off':$lPage.removeClass('header-navbar-fixed');break;case'side_scroll_toggle':$lPage.toggleClass('side-scroll');uiHandleScroll();break;case'side_scroll_on':$lPage.addClass('side-scroll');uiHandleScroll();break;case'side_scroll_off':$lPage.removeClass('side-scroll');uiHandleScroll();break;default:return false;}};var uiNav=function(){jQuery('[data-toggle="nav-submenu"]').on('click',function(e){var $link=jQuery(this);var $parentLi=$link.parent('li');if($parentLi.hasClass('open')){$parentLi.removeClass('open');}else{$link.closest('ul').find('> li').removeClass('open');$parentLi.addClass('open');}if($lHtml.hasClass('no-focus')){$link.blur();}return false;});};var uiBlocks=function(){uiBlocksApi(false,'init');jQuery('[data-toggle="block-option"]').on('click',function(){uiBlocksApi(jQuery(this).closest('.block'),jQuery(this).data('action'));});};var uiBlocksApi=function($block,$mode){var $iconFullscreen='si si-size-fullscreen';var $iconFullscreenActive='si si-size-actual';var $iconContent='si si-arrow-up';var $iconContentActive='si si-arrow-down';if($mode==='init'){jQuery('[data-toggle="block-option"][data-action="fullscreen_toggle"]').each(function(){var $this=jQuery(this);$this.html('<i class="'+(jQuery(this).closest('.block').hasClass('block-opt-fullscreen')?$iconFullscreenActive:$iconFullscreen)+'"></i>');});jQuery('[data-toggle="block-option"][data-action="content_toggle"]').each(function(){var $this=jQuery(this);$this.html('<i class="'+($this.closest('.block').hasClass('block-opt-hidden')?$iconContentActive:$iconContent)+'"></i>');});}else{var $elBlock=($block instanceof jQuery)?$block:jQuery($block);if($elBlock.length){var $btnFullscreen=jQuery('[data-toggle="block-option"][data-action="fullscreen_toggle"]',$elBlock);var $btnToggle=jQuery('[data-toggle="block-option"][data-action="content_toggle"]',$elBlock);switch($mode){case'fullscreen_toggle':$elBlock.toggleClass('block-opt-fullscreen');if($elBlock.hasClass('block-opt-fullscreen')){jQuery($elBlock).scrollLock('enable');}else{jQuery($elBlock).scrollLock('disable');}if($btnFullscreen.length){if($elBlock.hasClass('block-opt-fullscreen')){jQuery('i',$btnFullscreen).removeClass($iconFullscreen).addClass($iconFullscreenActive);}else{jQuery('i',$btnFullscreen).removeClass($iconFullscreenActive).addClass($iconFullscreen);}}break;case'fullscreen_on':$elBlock.addClass('block-opt-fullscreen');jQuery($elBlock).scrollLock('enable');if($btnFullscreen.length){jQuery('i',$btnFullscreen).removeClass($iconFullscreen).addClass($iconFullscreenActive);}break;case'fullscreen_off':$elBlock.removeClass('block-opt-fullscreen');jQuery($elBlock).scrollLock('disable');if($btnFullscreen.length){jQuery('i',$btnFullscreen).removeClass($iconFullscreenActive).addClass($iconFullscreen);}break;case'content_toggle':$elBlock.toggleClass('block-opt-hidden');if($btnToggle.length){if($elBlock.hasClass('block-opt-hidden')){jQuery('i',$btnToggle).removeClass($iconContent).addClass($iconContentActive);}else{jQuery('i',$btnToggle).removeClass($iconContentActive).addClass($iconContent);}}break;case'content_hide':$elBlock.addClass('block-opt-hidden');if($btnToggle.length){jQuery('i',$btnToggle).removeClass($iconContent).addClass($iconContentActive);}break;case'content_show':$elBlock.removeClass('block-opt-hidden');if($btnToggle.length){jQuery('i',$btnToggle).removeClass($iconContentActive).addClass($iconContent);}break;case'refresh_toggle':$elBlock.toggleClass('block-opt-refresh');if(jQuery('[data-toggle="block-option"][data-action="refresh_toggle"][data-action-mode="demo"]',$elBlock).length){setTimeout(function(){$elBlock.removeClass('block-opt-refresh');},2000);}break;case'state_loading':$elBlock.addClass('block-opt-refresh');break;case'state_normal':$elBlock.removeClass('block-opt-refresh');break;case'close':$elBlock.hide();break;case'open':$elBlock.show();break;default:return false;}}}};var uiForms=function(){jQuery('.form-material.floating > .form-control').each(function(){var $input=jQuery(this);var $parent=$input.parent('.form-material');setTimeout(function(){if($input.val()){$parent.addClass('open');}},150);$input.on('change',function(){if($input.val()){$parent.addClass('open');}else{$parent.removeClass('open');}});});};var uiHandleTheme=function(){var $cssTheme=jQuery('#css-theme');var $cookies=$lPage.hasClass('enable-cookies')?true:false;if($cookies){var $theme=Cookies.get('colorTheme')?Cookies.get('colorTheme'):false;if($theme){if($theme==='default'){if($cssTheme.length){$cssTheme.remove();}}else{if($cssTheme.length){$cssTheme.attr('href',$theme);}else{jQuery('#css-main').after('<link rel="stylesheet" id="css-theme" href="'+$theme+'">');}}}$cssTheme=jQuery('#css-theme');}jQuery('[data-toggle="theme"][data-theme="'+($cssTheme.length?$cssTheme.attr('href'):'default')+'"]').parent('li').addClass('active');jQuery('[data-toggle="theme"]').on('click',function(){var $this=jQuery(this);var $theme=$this.data('theme');jQuery('[data-toggle="theme"]').parent('li').removeClass('active');jQuery('[data-toggle="theme"][data-theme="'+$theme+'"]').parent('li').addClass('active');if($theme==='default'){if($cssTheme.length){$cssTheme.remove();}}else{if($cssTheme.length){$cssTheme.attr('href',$theme);}else{jQuery('#css-main').after('<link rel="stylesheet" id="css-theme" href="'+$theme+'">');}}$cssTheme=jQuery('#css-theme');if($cookies){Cookies.set('colorTheme',$theme,{expires:7});}});};var uiScrollTo=function(){jQuery('[data-toggle="scroll-to"]').on('click',function(){var $this=jQuery(this);var $target=$this.data('target');var $speed=$this.data('speed')?$this.data('speed'):1000;var $headerHeight=($lHeader.length&&$lPage.hasClass('header-navbar-fixed'))?$lHeader.outerHeight():0;jQuery('html, body').animate({scrollTop:jQuery($target).offset().top-$headerHeight},$speed);});};var uiToggleClass=function(){jQuery('[data-toggle="class-toggle"]').on('click',function(){var $el=jQuery(this);jQuery($el.data('target').toString()).toggleClass($el.data('class').toString());if($lHtml.hasClass('no-focus')){$el.blur();}});};var uiYearCopy=function(){var $date=new Date();var $yearCopy=jQuery('.js-year-copy');if($date.getFullYear()===2015){$yearCopy.html('2015');}else{$yearCopy.html('2015-'+$date.getFullYear().toString().substr(2,2));}};var uiLoader=function($mode){var $lpageLoader=jQuery('#page-loader');if($mode==='show'){if($lpageLoader.length){$lpageLoader.fadeIn(250);}else{$lBody.prepend('<div id="page-loader"></div>');}}else if($mode==='hide'){if($lpageLoader.length){$lpageLoader.fadeOut(250);}}return false;};var uiHelperPrint=function(){var $pageCls=$lPage.prop('class');$lPage.prop('class','');window.print();$lPage.prop('class',$pageCls);};var uiHelperTableToolsSections=function(){jQuery('.js-table-sections').each(function(){var $table=jQuery(this);jQuery('.js-table-sections-header > tr',$table).on('click',function(e){var $row=jQuery(this);var $tbody=$row.parent('tbody');if(!$tbody.hasClass('open')){jQuery('tbody',$table).removeClass('open');}$tbody.toggleClass('open');});});};var uiHelperTableToolsCheckable=function(){jQuery('.js-table-checkable').each(function(){var $table=jQuery(this);jQuery('thead input:checkbox',$table).on('click',function(){var $checkedStatus=jQuery(this).prop('checked');jQuery('tbody input:checkbox',$table).each(function(){var $checkbox=jQuery(this);$checkbox.prop('checked',$checkedStatus);uiHelperTableToolscheckRow($checkbox,$checkedStatus);});});jQuery('tbody input:checkbox',$table).on('click',function(){var $checkbox=jQuery(this);uiHelperTableToolscheckRow($checkbox,$checkbox.prop('checked'));});jQuery('tbody > tr',$table).on('click',function(e){if(e.target.type!=='checkbox'&&e.target.type!=='button'&&e.target.tagName.toLowerCase()!=='a'&&!jQuery(e.target).parent('label').length){var $checkbox=jQuery('input:checkbox',this);var $checkedStatus=$checkbox.prop('checked');$checkbox.prop('checked',!$checkedStatus);uiHelperTableToolscheckRow($checkbox,!$checkedStatus);}});});};var uiHelperTableToolscheckRow=function($checkbox,$checkedStatus){if($checkedStatus){$checkbox.closest('tr').addClass('active');}else{$checkbox.closest('tr').removeClass('active');}};var uiHelperAppear=function(){jQuery('[data-toggle="appear"]').each(function(){var $windowW=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;var $this=jQuery(this);var $class=$this.data('class')?$this.data('class'):'animated fadeIn';var $offset=$this.data('offset')?$this.data('offset'):0;var $timeout=($lHtml.hasClass('ie9')||$windowW<992)?0:($this.data('timeout')?$this.data('timeout'):0);$this.appear(function(){setTimeout(function(){$this.removeClass('visibility-hidden').addClass($class);},$timeout);},{accY:$offset});});};var uiHelperAppearCountTo=function(){jQuery('[data-toggle="countTo"]').each(function(){var $this=jQuery(this);var $after=$this.data('after');var $before=$this.data('before');var $speed=$this.data('speed')?$this.data('speed'):1500;var $interval=$this.data('interval')?$this.data('interval'):15;$this.appear(function(){$this.countTo({speed:$speed,refreshInterval:$interval,onComplete:function(){if($after){$this.html($this.html()+$after);}else if($before){$this.html($before+$this.html());}}});});});};var uiHelperSlimscroll=function(){jQuery('[data-toggle="slimscroll"]').each(function(){var $this=jQuery(this);var $height=$this.data('height')?$this.data('height'):'200px';var $size=$this.data('size')?$this.data('size'):'5px';var $position=$this.data('position')?$this.data('position'):'right';var $color=$this.data('color')?$this.data('color'):'#000';var $avisible=$this.data('always-visible')?true:false;var $rvisible=$this.data('rail-visible')?true:false;var $rcolor=$this.data('rail-color')?$this.data('rail-color'):'#999';var $ropacity=$this.data('rail-opacity')?$this.data('rail-opacity'):.3;$this.slimScroll({height:$height,size:$size,position:$position,color:$color,alwaysVisible:$avisible,railVisible:$rvisible,railColor:$rcolor,railOpacity:$ropacity});});};var uiHelperMagnific=function(){jQuery('.js-gallery').each(function(){jQuery(this).magnificPopup({delegate:'a.img-link',type:'image',gallery:{enabled:true}});});jQuery('.js-gallery-advanced').each(function(){jQuery(this).magnificPopup({delegate:'a.img-lightbox',type:'image',gallery:{enabled:true}});});};var uiHelperCkeditor=function(){CKEDITOR.disableAutoInline=true;if(jQuery('#js-ckeditor-inline').length){CKEDITOR.inline('js-ckeditor-inline');}if(jQuery('#js-ckeditor').length){CKEDITOR.replace('js-ckeditor');}};var uiHelperSummernote=function(){jQuery('.js-summernote-air').summernote({airMode:true});jQuery('.js-summernote').summernote({height:350,minHeight:null,maxHeight:null});};var uiHelperSlick=function(){jQuery('.js-slider').each(function(){var $slider=jQuery(this);var $sliderArrows=$slider.data('slider-arrows')?$slider.data('slider-arrows'):false;var $sliderDots=$slider.data('slider-dots')?$slider.data('slider-dots'):false;var $sliderNum=$slider.data('slider-num')?$slider.data('slider-num'):1;var $sliderAuto=$slider.data('slider-autoplay')?$slider.data('slider-autoplay'):false;var $sliderAutoSpeed=$slider.data('slider-autoplay-speed')?$slider.data('slider-autoplay-speed'):3000;$slider.slick({arrows:$sliderArrows,dots:$sliderDots,slidesToShow:$sliderNum,autoplay:$sliderAuto,autoplaySpeed:$sliderAutoSpeed});});};var uiHelperDatepicker=function(){jQuery('.js-datepicker').add('.input-daterange').datepicker({weekStart:1,autoclose:true,todayHighlight:true});};var uiHelperColorpicker=function(){jQuery('.js-colorpicker').each(function(){var $colorpicker=jQuery(this);var $colorpickerMode=$colorpicker.data('colorpicker-mode')?$colorpicker.data('colorpicker-mode'):'hex';var $colorpickerinline=$colorpicker.data('colorpicker-inline')?true:false;$colorpicker.colorpicker({'format':$colorpickerMode,'inline':$colorpickerinline});});};var uiHelperMaskedInputs=function(){jQuery('.js-masked-date').mask('99/99/9999');jQuery('.js-masked-date-dash').mask('99-99-9999');jQuery('.js-masked-phone').mask('(999) 999-9999');jQuery('.js-masked-phone-ext').mask('(999) 999-9999? x99999');jQuery('.js-masked-taxid').mask('99-9999999');jQuery('.js-masked-ssn').mask('999-99-9999');jQuery('.js-masked-pkey').mask('a*-999-a999');jQuery('.js-masked-time').mask('99:99');};var uiHelperTagsInputs=function(){jQuery('.js-tags-input').tagsInput({height:'36px',width:'100%',defaultText:'Add tag',removeWithBackspace:true,delimiter:[',']});};var uiHelperSelect2=function(){jQuery('.js-select2').select2();};var uiHelperHighlightjs=function(){hljs.initHighlightingOnLoad();};var uiHelperNotify=function(){jQuery('.js-notify').on('click',function(){var $notify=jQuery(this);var $notifyMsg=$notify.data('notify-message');var $notifyType=$notify.data('notify-type')?$notify.data('notify-type'):'info';var $notifyFrom=$notify.data('notify-from')?$notify.data('notify-from'):'top';var $notifyAlign=$notify.data('notify-align')?$notify.data('notify-align'):'right';var $notifyIcon=$notify.data('notify-icon')?$notify.data('notify-icon'):'';var $notifyUrl=$notify.data('notify-url')?$notify.data('notify-url'):'';jQuery.notify({icon:$notifyIcon,message:$notifyMsg,url:$notifyUrl},{element:'body',type:$notifyType,allow_dismiss:true,newest_on_top:true,showProgressbar:false,placement:{from:$notifyFrom,align:$notifyAlign},offset:20,spacing:10,z_index:1033,delay:5000,timer:1000,animate:{enter:'animated fadeIn',exit:'animated fadeOutDown'}});});};var uiHelperDraggableItems=function(){jQuery('.js-draggable-items > .draggable-column').sortable({connectWith:'.draggable-column',items:'.draggable-item',dropOnEmpty:true,opacity:.75,handle:'.draggable-handler',placeholder:'draggable-placeholder',tolerance:'pointer',start:function(e,ui){ui.placeholder.css({'height':ui.item.outerHeight(),'margin-bottom':ui.item.css('margin-bottom')});}});};var uiHelperEasyPieChart=function(){jQuery('.js-pie-chart').easyPieChart({barColor:jQuery(this).data('bar-color')?jQuery(this).data('bar-color'):'#777777',trackColor:jQuery(this).data('track-color')?jQuery(this).data('track-color'):'#eeeeee',lineWidth:jQuery(this).data('line-width')?jQuery(this).data('line-width'):3,size:jQuery(this).data('size')?jQuery(this).data('size'):'80',animate:750,scaleColor:jQuery(this).data('scale-color')?jQuery(this).data('scale-color'):false});};var uiHelperMaxlength=function(){jQuery('.js-maxlength').each(function(){var $input=jQuery(this);$input.maxlength({alwaysShow:$input.data('always-show')?true:false,threshold:$input.data('threshold')?$input.data('threshold'):10,warningClass:$input.data('warning-class')?$input.data('warning-class'):'label label-warning',limitReachedClass:$input.data('limit-reached-class')?$input.data('limit-reached-class'):'label label-danger',placement:$input.data('placement')?$input.data('placement'):'bottom',preText:$input.data('pre-text')?$input.data('pre-text'):'',separator:$input.data('separator')?$input.data('separator'):'/',postText:$input.data('post-text')?$input.data('post-text'):''});});};var uiHelperDatetimepicker=function(){jQuery('.js-datetimepicker').each(function(){var $input=jQuery(this);$input.datetimepicker({format:$input.data('format')?$input.data('format'):false,useCurrent:$input.data('use-current')?$input.data('use-current'):false,locale:moment.locale(''+($input.data('locale')?$input.data('locale'):'')+''),showTodayButton:$input.data('show-today-button')?$input.data('show-today-button'):false,showClear:$input.data('show-clear')?$input.data('show-clear'):false,showClose:$input.data('show-close')?$input.data('show-close'):false,sideBySide:$input.data('side-by-side')?$input.data('side-by-side'):false,inline:$input.data('inline')?$input.data('inline'):false,icons:{time:'si si-clock',date:'si si-calendar',up:'si si-arrow-up',down:'si si-arrow-down',previous:'si si-arrow-left',next:'si si-arrow-right',today:'si si-size-actual',clear:'si si-trash',close:'si si-close'}});});};var uiHelperRangeslider=function(){jQuery('.js-rangeslider').each(function(){var $input=jQuery(this);$input.ionRangeSlider({input_values_separator:';'});});};var uiHelperSimpleMDE=function(){jQuery('.js-simplemde').each(function(){var el=jQuery(this);new SimpleMDE({element:el[0]});});};return{init:function($func){switch($func){case'uiInit':uiInit();break;case'uiLayout':uiLayout();break;case'uiNav':uiNav();break;case'uiBlocks':uiBlocks();break;case'uiForms':uiForms();break;case'uiHandleTheme':uiHandleTheme();break;case'uiToggleClass':uiToggleClass();break;case'uiScrollTo':uiScrollTo();break;case'uiYearCopy':uiYearCopy();break;case'uiLoader':uiLoader('hide');break;default:uiInit();uiLayout();uiNav();uiBlocks();uiForms();uiHandleTheme();uiToggleClass();uiScrollTo();uiYearCopy();uiLoader('hide');}},layout:function($mode){uiLayoutApi($mode);},loader:function($mode){uiLoader($mode);},blocks:function($block,$mode){uiBlocksApi($block,$mode);},initHelper:function($helper){switch($helper){case'print-page':uiHelperPrint();break;case'table-tools':uiHelperTableToolsSections();uiHelperTableToolsCheckable();break;case'appear':uiHelperAppear();break;case'appear-countTo':uiHelperAppearCountTo();break;case'slimscroll':uiHelperSlimscroll();break;case'magnific-popup':uiHelperMagnific();break;case'ckeditor':uiHelperCkeditor();break;case'summernote':uiHelperSummernote();break;case'slick':uiHelperSlick();break;case'datepicker':uiHelperDatepicker();break;case'colorpicker':uiHelperColorpicker();break;case'tags-inputs':uiHelperTagsInputs();break;case'masked-inputs':uiHelperMaskedInputs();break;case'select2':uiHelperSelect2();break;case'highlightjs':uiHelperHighlightjs();break;case'notify':uiHelperNotify();break;case'draggable-items':uiHelperDraggableItems();break;case'easy-pie-chart':uiHelperEasyPieChart();break;case'maxlength':uiHelperMaxlength();break;case'datetimepicker':uiHelperDatetimepicker();break;case'rangeslider':uiHelperRangeslider();break;case'simplemde':uiHelperSimpleMDE();break;default:return false;}},initHelpers:function($helpers){if($helpers instanceof Array){for(var $index in $helpers){App.initHelper($helpers[$index]);}}else{App.initHelper($helpers);}}};}();var OneUI=App;jQuery(function(){if(typeof angular=='undefined'){App.init();}});