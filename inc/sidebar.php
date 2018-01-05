<div class="sidebar clear">

            <div class="semisidebar">

                <h2>Post Catagories</h2>
                <ul>
                       <?php
                            
                            $query="select *  from cat_tbl";
                            $catagory=$db->select($query);
                            if($catagory)
                            {
                                while ($result=$catagory->fetch_assoc()) {
                            ?>
                            <li><a href="posts.php?catagory=<?php echo $result['catid']; ?>"><?php echo $result['name'];?></a></li>
                        <?php } } else{ ?>
                             <li>No Catagori Found</li>

                        <?php }?>
                     
                </ul>
                
            </div>
    	    

</div>