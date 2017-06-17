 $(document).ready(function() {
     // Initializes search overlay plugin.
     // Replace onSearchSubmit() and onKeyEnter() with 
     // your logic to perform a search and display results
     $('[data-pages="search"]').search({
         searchField: '#overlay-search',
         closeButton: '.overlay-close',
         suggestions: '#overlay-suggestions',
         brand: '.brand',
         onSearchSubmit: function(searchString) {
             console.log("Search for: " + searchString);
         },
         onKeyEnter: function(searchString) {
             console.log("Live search for: " + searchString);
             var searchField = $('#overlay-search');
             var searchResults = $('.search-results');
             clearTimeout($.data(this, 'timer'));
             searchResults.fadeOut("fast");
             var wait = setTimeout(function() {
                 searchResults.find('.result-name').each(function() {
                     if (searchField.val().length != 0) {
                         $(this).html(searchField.val());
                         searchResults.fadeIn("fast");
                     }
                 });
             }, 500);
             $(this).data('timer', wait);
         }
     });
     //
     // Activate sliderui
     //
     // Apply the plugin to the element

     var stepSlider = document.getElementById('noUiSlider');
     var stepSliderValueElement = document.getElementById('slider-step-value');
     var inputFormat = document.getElementById('daysPerWeek');

     //create the slider
     noUiSlider.create(stepSlider, {
         start: 1,
         connect: "lower",
         step: 1,
         range: {
             'min': [1],
             'max': [7]
         },
         format: wNumb({
             decimals: 0
         }),
         pips: {
             mode: 'values',
             values: [1, 2, 3, 4, 5, 6, 7],
             density: 4
         }
     });

     // default state of field
     var storedValue = inputFormat.value;
     stepSlider.noUiSlider.set(storedValue);

     //link to input field on change
     stepSlider.noUiSlider.on('change', function(values, handle) {
         inputFormat.value = values[handle];
     });

 });