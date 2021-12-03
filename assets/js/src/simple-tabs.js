/**
  * Simple Tabs
  * @link https://codepen.io/luiscolome/pen/PoKEEmg
  * 
  */

jQuery(document).ready(function($){

    $('.tabgroup > div').hide();
    $('.tabgroup > div:first-of-type').show();

    $('.tabs a').click(function(e){
    e.preventDefault();
        var $this = $(this),
            tabgroup = '#'+$this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div.tabcontent').hide();
        $(target).show();
    
    });
    

    /**
     *  @param string name of tabgroup ('first-tab-group')
     *  @param string id of tab with # ('#tab1')
     */
    function swapTab(tabgroup, tab) {
    
      $('.tabs[data-tabgroup='+tabgroup+'] a').removeClass('active');
      $('.tabs[data-tabgroup='+tabgroup+'] a[href="'+tab+'"]').addClass('active');
    
      $('.tabgroup[data-tabgroup="'+tabgroup+'"] > div.tabcontent').hide();
      $(tab).show();
    };

    $('.tabs a').click(function(e){
      e.preventDefault();
      var tab = $(this).attr('href');
      var tabgroup = $(this).closest('.tabs').data('tabgroup');
    
      swapTab(tabgroup, tab);
    
    });

});