jQuery(document).ready(function($) {
    // Toggle view
    $('.view-toggle .toggle-btn').on('click', function() {
        var $eventList = $('.event-list');
        var $toggleBtn = $(this);
        
        if ($eventList.hasClass('grid-view')) {
            $eventList.removeClass('grid-view').addClass('list-view');
            $toggleBtn.text('Switch to Grid View');
        } else {
            $eventList.removeClass('list-view').addClass('grid-view');
            $toggleBtn.text('Switch to List View');
        }
    });

    // Filter function
    function filterEvents() {
        var selectedCategory = $('#category-filter').val();
        var selectedDate = $('#date-filter').val();
        var searchTerm = $('#search-filter').val().toLowerCase();

        $('.event-item').each(function() {
            var $item = $(this);
            var itemCategory = $item.data('category');
            var itemDate = $item.data('date');
            var itemTitle = $item.data('title').toLowerCase();
            var itemDescription = $item.data('description').toLowerCase();

            var categoryMatch = selectedCategory === 'all' || 
                                itemCategory === selectedCategory || 
                                (selectedCategory === 'Others' && itemCategory !== 'Conference' && itemCategory !== 'Exhibition');

            var dateMatch = !selectedDate || itemDate === selectedDate;

            var searchMatch = !searchTerm || 
                              itemTitle.includes(searchTerm) || 
                              itemDescription.includes(searchTerm);

            if (categoryMatch && dateMatch && searchMatch) {
                $item.show();
            } else {
                $item.hide();
            }
        });
    }

    // Category filter
    $('#category-filter').on('change', filterEvents);

    // Date filter
    $('#date-filter').on('change', filterEvents);

    // Search filter
    $('#search-filter').on('input', filterEvents);

    // Clear filters
    $('#clear-filters').on('click', function() {
        $('#search-filter').val('');
        $('#category-filter').val('all');
        $('#date-filter').val('');
        $('.event-item').show();
    });
});