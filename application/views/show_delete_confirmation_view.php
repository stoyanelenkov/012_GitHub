<p>Are you sure you want to DELETE this product?</p>
<table>
    <th>id</th>
    <th>type</th>
    <th>brand</th>
    <th>model</th>
    <th>price</th>
    <th>img</th>
    <th>action</th>
    
    
<?php 
//foreach ($prod_array as $value) {
    echo '<tr>';
    echo '<td>'.$id.'</td>';
    echo '<td>'.$type.'</td>';
    echo '<td>'.$brand.'</td>';
    echo '<td>'.$model.'</td>';
    echo '<td>'.$price.'</td>';
    echo '<td>'; 
    if($img_url!=''){ 
            echo '<img src="'.site_url('/images/products').'/'.$img_url.'">';
            
    }
    echo'</td>';
?>
    <td>
        <button type="button" onclick="window.location.href='<?=  site_url('/login/delete_product/'.$id);?>'">Delete</button>
        <button type="button" onclick="window.location.href='<?=  site_url('/login/show_all_products');?>'">Cancel</button>
    </td>

</tr>
</table>