<div class="table">
<table>
    <th>id</th>
    <th>type</th>
    <th>brand</th>
    <th>model</th>
    <th>price</th>
    <th>img</th>
    <th>action</th>
    
    
<?php 
foreach ($prod_array as $value) {
    echo '<tr>';
    echo '<td>'.$value->id_product.'</td>';
    echo '<td>'.$value->type.'</td>';
    echo '<td>'.$value->brand.'</td>';
    echo '<td>'.$value->model.'</td>';
    echo '<td>'.$value->price.'</td>';
    echo '<td>'; 
        if($value->img_url!=''){ 
            echo '<img src="'.site_url('/images/products').'/'.$value->img_url.'" alt="&nbsp;file corrupted">';
            
        }
    echo'</td>';
    echo'<td>';
    //echo '<button type="button">Modify</button>';
?>
    <button type="button" onclick="window.location.href='<?= site_url('/login/delete_confirmation/'.$value->id_product.'/'.$value->type.'/'.$value->brand.'/'.$value->model.'/'.$value->price.'/'.$value->img_url);?>'">Delete</button></td>
<?php
    echo '</tr>';
}

?>
</table>
    <?php echo $this->pagination->create_links();?>
</div>
<?php
if(ISSET($msg)&&$msg=="deleted"){?>
    <script type="text/javascript">
    alert('Product deleted successfully!');
    </script>
<?php
}
if(ISSET($msg)&&$msg=="error"){?>
    <script type="text/javascript">
    alert('Something has gone wrong!');
    </script>
<?php
}
if(ISSET($msg)&&$msg=="added"){?>
    <script type="text/javascript">
    alert('Product added successfully!');
    </script>
<?php
}
if(ISSET($msg)&&$msg=="not_added"){?>
    <script type="text/javascript">
    alert('Something has gone wrong!<br/>Product NOT added!');
    </script>
<?php
}