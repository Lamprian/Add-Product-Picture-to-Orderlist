add_filter( 'woocommerce_my_account_my_orders_columns', 'filter_woocommerce_my_account_my_orders_columns', 10, 1 );
function filter_woocommerce_my_account_my_orders_columns( $columns ) {
    $new_column = array( 'order-number' => $columns['order-number']);
    unset($columns['order-number']);

    $new_column['order-thumbnails'] = '';

    return array_merge($new_column, $columns);
}


add_action( 'woocommerce_my_account_my_orders_column_order-thumbnails', 'filter_woocommerce_my_account_my_orders_column_order', 10, 1 );
function filter_woocommerce_my_account_my_orders_column_order( $order ) {
    // Loop through order items
    foreach( $order->get_items() as $item ) {
        $product   = $item->get_product(); // Get the WC_Product object (from order item)
        $thumbnail = $product->get_image(array( 36, 36)); // Get the product thumbnail (from product object)
        if( $product->get_image_id() > 0 ) {
            echo $thumbnail . '&nbsp;' ;
        }
    }
}
