'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: {cookie: false},
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      columns: [
        {
          field: 'DepositPaid',
          type: 'number',
        },
        {
          field: 'OrderDate',
          type: 'date',
          format: 'YYYY-MM-DD',
        }, {
          field: 'Status',
          title: 'Status',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': '재원생',
                'class': 'jewon',
              },
              2: {
                'title': '퇴원생',
                'class': 'tewon',
              },
              3: {
                'title': '예비생',
                'class': 'ebi',
              },
              4: {
                'title': '졸업생',
                'class': 'jol',
              },
            };
            return status[row.Status].title;
          },
        }, {
          field: 'Teacher',
          title: 'Teacher',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              1: {
                'title': 'Online',
                'state': 'danger',
              },
              2: {
                'title': 'Retail',
                'state': 'primary',
              },
              3: {
                'title': 'Direct',
                'state': 'success',
              },
            };
            return status[row.Status].title;
          },
        },
      ],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val(), 'Status');
    });

    $('#kt_datatable_search_type').on('change', function() {
      datatable.search($(this).val(), 'Type');
    });

    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});
