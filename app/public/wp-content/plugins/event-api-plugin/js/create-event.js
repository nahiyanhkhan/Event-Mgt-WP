jQuery(document).ready(function($) {
    $('#create-event-form').on('submit', function(e) {
        e.preventDefault();

        var formData = {
            'title': $('#event-title').val(),
            'description': $('#event-description').val(),
            'date': $('#event-date').val(),
            'time': $('#event-time').val(),
            'location': $('#event-location').val(),
            'category': $('#event-category').val()
        };

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'create_event',
                event_data: formData
            },
            success: function(response) {
                alert('Event created successfully!');
                $('#create-event-form')[0].reset();
            },
            error: function() {
                alert('Error creating event. Please try again.');
            }
        });
    });
});