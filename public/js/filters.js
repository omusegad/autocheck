jQuery(function($) {
    dataTable = $("#matrix").DataTable({
        "columnDefs": [{
            "targets": [0],
            "visible": false
        }]

    });

    $('.filter-checkbox').on('change', function(e) {
        var searchTerms = []
        $.each($('.filter-checkbox'), function(i, elem) {
            if ($(elem).prop('checked')) {
                searchTerms.push("^" + $(this).val() + "$")
            }
        })
        dataTable.column(4).search(searchTerms.join('|'), true, false, true).draw();
    });


    $('.pillar-dropdown').on('change', function(e) {
        var pillar = $(this).val();
        $('.pillar-dropdown').val(pillar)
        console.log(pillar)
            //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
        dataTable.column(0).search(pillar).draw();
    });

    $('.country-dropdown').on('change', function(e) {
        var country = $(this).val();
        $('.country-dropdown').val(country)
        console.log(country)
            //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
        dataTable.column(1).search(country).draw();
    })
});
