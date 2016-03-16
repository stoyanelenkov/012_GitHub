	</div>
        <?php $hi=$this->session->userdata('email');?>
        <p class="footer"><?php if (isset($hi)){echo 'Logged as '.$this->session->userdata('email').'</br>';}?> Stoyan Elenkov © 2016</p>
</div>

</body>
</html>