const product_table = document.querySelector('#product_table');

function clearTable(table) {
    while (table.firstChild) {
        table.removeChild(table.firstChild);
        console.log('Hello')
    }
}

$('#select_btn').click(function () {
    let u1_input = $("#u1_input").val();
    let u3_input = $("#u3_input").val().trim();
    let u4_input = $("#u4_input").val().trim();
    let u7_input = $("#u7_input").val();
    let u5_input = $("#u5_input").val().trim();

    $.ajax({
        url: 'sort.php',
        type: 'POST',
        data: {u1_input: u1_input, u3_input: u3_input, u4_input: u4_input, u7_input: u7_input, u5_input: u5_input},
        dataType: "html",
        success: function (data) {
            clearTable(product_table);
            data = JSON.parse(data);
            let product_data = "";
            data.forEach(element => {

                product_data += '<tr>';
                product_data += '<td>' + element.id + '</td>';
                product_data += '<td>' + element.product_name + '</td>';
                product_data += '<td>' + element.the_cost_rub + '</td>';
                product_data += '<td>' + element.wholesale_price_rub + '</td>';
                product_data += '<td>' + element.stock_availability_1_st + '</td>';
                product_data += '<td>' + element.stock_availability_2_st + '</td>';
                product_data += '<td>' + element.producing_country + '</td>';
                product_data += '<td>' + '' + '</td>';
                product_data += '</tr>';
            });
            $('#product_table').append(product_data);

        }
    })
});
