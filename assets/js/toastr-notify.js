/*
 *|=======================================|
 *| [toastr-notify.js]
 *|
 *| Marcador Special Toastr Notifications
 *| Good for UI messages
 *| 
 *| 
 *| @author Richard Blondet
 *|=======================================|
*/


function marcadorToastr( message, displayLength, className, completeCallback ) {
	
	/**
	 * Passed on className for different types of toastrs
	 * @type {string}
	 */
	className = className || "";

	/**
	 * Toaster container
	 * @type {nodeObj}
	 */
	var container = document.getElementById("toast-container");

	/**
	 * The container doesn't exists, let us add it
	 * @param  {node} container Toastr container
	 * @return {node}           Toastr htmlNode
	 */
	if( container === null ){
		container = document.createElement('div');
		container.id = 'toast-container';
		document.body.appendChild( container );
	}

	/**
	 * Create new toast per message
	 * @type {nodeObj}
	 */
	var newToast = createToast( message );

    /**
     * message parameter is not undefined, lets proceed
     * @param  {string} typeof message       ! message string
     * @return {mix}        it could be nodeObj, or jQueryObj
     */
    if ( typeof message !== "undefined" ) {
    	container.appendChild( newToast );
    	var toastrs = document.getElementsByClassName("toast");
    	
    	if( toastrs.length > 3 ){
    		jQuery(toastrs[0]).animate({
            	opacity: 0,
            	top: "-40px"
            }, 375, "linear", function(){
		    	/**
		    	 * if callback is a function, and provided, execute it! 
		    	 * @type {function}
		    	 */
		    	if ( typeof completeCallback === "function")
		    		completeCallback();

                /**
                 * Remove the toastr
                 */
                jQuery(this).remove();
            });
    	}
    }

    newToast.style.top = '35px';
    newToast.style.opacity = 0;

    /**
     * Animate toast in
     * @type {String}
     */
    jQuery( newToast ).animate({
    	top: "0px",
    	opacity: 1
    }, 300, "linear");

    /**
     * Set a time for current toastr
     * @type {int}
     */
    var timeLeft = displayLength ? displayLength : 6000;
    
    var counterInterval = setInterval( function() {

    	if ( newToast.parentNode === null )
    		window.clearInterval(counterInterval);

        /**
         * If toast is not being dragged, decrease its time remaining
         * @param  {contains class} !newToast.classList.contains('panning') check if class exists
         */
        if (!newToast.classList.contains('panning')) {
        	timeLeft -= 20;
        }

        /**
         * Remaining time is less than 0, remove message
         * @param  {Number} timeLeft <             the time left
         */
        if (timeLeft <= 0) {
            // Animate toast out
            jQuery( newToast ).animate({
            	opacity: 0,
            	top: "-40px"
            }, 375, "linear", function(){
		    	// Execute callback
		    	if ( typeof( completeCallback ) === "function" )
		    		completeCallback();

                // Remove toast after it times out
                jQuery( this ).remove();
            });
            
            window.clearInterval( counterInterval );
        }
    }, 20);
	
	/**
	 * Create toast with provided message
	 * @param  {string} html the message either string of html
	 * @return {mix}      either nodeobj or jquery obj
	 */
    function createToast( html ) {

        /**
         * Create toast
         * @type {nodeObj}
         */
        var toast = document.createElement('div');
        toast.classList.add('toast');
        
        /**
         * if ClassName is not an empty string
         * @param  {string} className the class
         */
        if ( className ) {
        	var classes = className.split(' ');

        	for (var i = 0, count = classes.length; i < count; i++) {
        		toast.classList.add(classes[i]);
        	}
        }
        
        /**
         * If type of parameter is HTML Element
         * @param  {node} typeof HTMLElement   node element
         */
        if ( typeof HTMLElement === "object" ? html instanceof HTMLElement : html && typeof html === "object" && html !== null && html.nodeType === 1 && typeof html.nodeName === "string" ) {
        	toast.appendChild( html );
        } else if (html instanceof jQuery) {
            // Check if it is jQuery object
            toast.appendChild(html[0]);
        } else {
            // Insert as text;
            toast.innerHTML = html;
        }
        

		return toast;
	}
}