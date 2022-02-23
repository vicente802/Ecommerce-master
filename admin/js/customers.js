$(document).ready(function() {

    getCustomers();
    getCustomerOrders();

    function getCustomers() {
        $.ajax({
            url: '../admin/classes/Customers.php',
            method: 'POST',
            data: { GET_CUSTOMERS: 1 },
            success: function(response) {

                console.log(response);
                var resp = $.parseJSON(response);
                if (resp.status == 202) {

                    var customersHTML = "";

                    $.each(resp.message, function(index, value) {

                        customersHTML += '<tr>' +
                            '<td>#</td>' +
                            '<td>' + value.first_name + ' ' + value.last_name + '</td>' +
                            '<td>' + value.email + '</td>' +
                            '<td>' + value.mobile + '</td>' +
                            '<td>' + value.address1 + '<br>' + value.address2 + '</td>' +
                            '</tr>'

                    });

                    $("#customer_list").html(customersHTML);

                } else if (resp.status == 303) {

                }

            }
        })

    }

    function getCustomerOrders() {
        $.ajax({
            url: '../admin/classes/Customers.php',
            method: 'POST',
            data: { GET_CUSTOMER_ORDERS: 1 },
            success: function(response) {

                console.log(response);
                var resp = $.parseJSON(response);
                if (resp.status == 202) {

                    var customerOrderHTML = "";

                    $.each(resp.message, function(index, value) {
                        var total = value.qty * value.product_price;
                        customerOrderHTML += '<tr>' +
                            '<td>' + value.order_id + '</td>' +
                            '<td>' + value.product_title + '</td>' +
                            '<td>' + value.product_id + '</td>' +
                            '<td>' + value.trx_id + '</td>' +
                            '<td>' + value.qty + '</td>' +
                            '<td>' + total + '</td>' +
                            '<td>' + value.datetime + '</td>' +
                            '<td>' + value.p_status + '</td>' +
                            '<td><form action="action.php" method="POST"><select name="status" value="status" id="status"><option value="Queue">Status</option><option value="Preparing..." >Preparing</option><option value="Preparing" ></option></select> <input type="submit" value="update"></form></td>' +



                            '</tr>';


                    });

                    $("#customer_order_list").html(customerOrderHTML);

                } else if (resp.status == 303) {
                    $("#customer_order_list").html(resp.message);
                }

            }
        })

    }


});