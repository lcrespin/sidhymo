/*
 * Class searchbar
 */
var notifications = function(map_instance){
	this.construct = function(map_instance){

	}

    this.addNotification = function() {
    	
    	var html_notif = '\
    	<div id="stcarhyce" class="toast" style="z-index:10001">\
    	    <div class="toast-header">\
    	        <img src="modules/custom/mapviewer/images/stcarhyce_blue.png" width="20" style="margin: 7px;">\
    	        <strong class="mr-auto">Chargement des stations carhyce en cours...</strong>\
    	        <img src="https://miro.medium.com/max/1120/1*hShXr9hDtKxHbHe3jQ_DQw.gif" style="width: 90px;">\
    	        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">\
    	            <span aria-hidden="true">×</span>\
    	        </button>\
    	    </div>\
    	</div>\
    	'
    	jQuery('#notifications').append(html_notif)
    	jQuery("#stcarhyce").toast({delay:1000})
    	jQuery("#stcarhyce").toast('show')
	}


    /*
     * Pass options when class instantiated
     */
    this.construct(map_instance);


};
