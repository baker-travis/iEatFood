<div data-role="page" id="details">
    <?php include "menu.php" ?>  

    <div data-role="main" class="ui-content" id="details_content">
        <img id="headerImage" src="" alt="restaurant" />
        <img id="restaurantRating" src="" alt="rating" />
        <p id="userComment"></p>
    </div>

    <div data-role="footer">
        <h1>Footer Text</h1>
    </div>
    <script>
        $(document).bind( "pagebeforechange", function( e, data ) {

            // We only want to handle changePage() calls where the caller is
            // asking us to load a page by URL.
            if ( typeof data.toPage === "string" ) {

                // We are being asked to load a page by URL, but we only
                // want to handle URLs that request the data for a specific
                // category.
                var u = $.mobile.path.parseUrl( data.toPage ),
                    re = /^#details/;

                if ( u.hash.search(re) !== -1 ) {

                    // We're being asked to display the items for a specific category.
                    // Call our internal method that builds the content for the category
                    // on the fly based on our in-memory category data structure.
                    
                    showCategory( u, data.options );

                    // Make sure to tell changePage() we've handled this call so it doesn't
                    // have to do anything.
                    e.preventDefault();
                }
            }
        });
        
        // Load the data for a specific category, based on
        // the URL passed in. Generate markup for the items in the
        // category, inject it into an embedded page, and then make
        // that page the current active page.
        function preparePage(data, urlObj, options)
        {

                // The pages we use to display our content are already in
                // the DOM. The id of the page we are going to write our
                // content into is specified in the hash before the '?'.
                pageSelector = urlObj.hash.replace( /\?.*$/, "" );
            
            // Get the page we are going to dump our content into.
            var $page = $( pageSelector ),

                // Get the header for the page.
                $header = $page.children( ":jqmData(role=header)" ),

                // Get the content area element for the page.
                $content = $page.children( ":jqmData(role=content)" );
            
            //Set up data on the page.                    
            $("#headerImage").attr("src", data.image_url);
            $("#restaurantRating").attr("src", data.rating_img_url);
            $("#restaurantRating").attr("alt", (data.rating + " " + "stars"));
            $("#userComment").html(data.snippet_text);
            
            // Find the h1 element in our header and inject the name of
            // the category into it.
            $header.find( "h1" ).html(data.name);

            // Pages are lazily enhanced. We call page() on the page
            // element to make sure it is always enhanced before we
            // attempt to enhance the listview markup we just injected.
            // Subsequent calls to page() are ignored since a page/widget
            // can only be enhanced once.
            $page.page();

            // We don't want the data-url of the page we just modified
            // to be the url that shows up in the browser's location field,
            // so set the dataUrl option to the URL for the category
            // we just loaded.
            options.dataUrl = urlObj.href;

            // Now call changePage() and tell it to switch to
            // the page we just modified.
            $.mobile.changePage( $page, options );
        }
        
        function showCategory(u, options) {
            var theid = u.hash.split("?id=");
            console.log("ID: " + theid);
            
            $.get("yelpRequests.php", {id: theid[1]},
                  function(data) {
                console.log(data);
                preparePage(data, u, options);
            }, "json");
        }
    </script>
    
</div>