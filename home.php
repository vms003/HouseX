<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Champagne+Sorbet&display=swap" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/new.css">
   <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>
   
<?php include 'components/user_header.php'; ?>


<!-- home section starts  -->
<div class="home">
   <section class="center">
      <form action="search.php" method="post">
         <h3>Find Your Perfect Home</h3>
         <div class="flex">
            <div class="box">
               <p>Enter Location <span>*</span></p>
               <input type="text" name="h_location" required maxlength="100" placeholder="Enter city name" class="input">
            </div>
            <div class="box">
               <p>Property Type <span>*</span></p>
               <select name="h_type" class="input" required>
                  <option value="flat">Flat</option>
                  <option value="house">House</option>
                  <option value="shop">Shop</option>
               </select>
            </div>
            <div class="box">
               <p>Offer Type <span>*</span></p>
               <select name="h_offer" class="input" required>
                  <option value="sale">Sale</option>
                  <option value="resale">Resale</option>
                  <option value="rent">Rent</option>
               </select>
            </div>
            <div class="box">
               <p>Budget Range <span>*</span></p>
               <input type="number" name="h_min" placeholder="Min" class="input" required>
               <input type="number" name="h_max" placeholder="Max" class="input" required>
            </div>
         </div>
         <input type="submit" value="Search Property" name="h_search" class="btn">
      </form>
   </section>
</div>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading">our services</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/Buy.png" alt="">
         <h3>buy house</h3>
         <p>Turning Dreams into Addresses: Find Your Forever Home with Us – Where Every Step Leads to Possibilities.</p>
      </div>

      <div class="box">
         <img src="images/Rent.png" alt="">
         <h3>rent house</h3>
         <p> Your Next Chapter Awaits: Discover Rental Homes That Embrace Your Lifestyle – Where Comfort and Convenience Meet.</p>
      </div>

      <div class="box">
         <img src="images/sell.png" alt="">
         <h3>sell house</h3>
         <p>Let Us Showcase Your Home's Journey to the Right Buyer – Where Opportunities Find Their Match.</p>
      </div>

      <div class="box">
         <img src="images/pg1.jpg" alt="">
         <h3>PG & Hostels</h3>
         <p>Creating Comforting Spaces Away from Home: Explore PGs and Hostels That Feel Like Family – Where New Journeys Begin.</p>
      </div>

      <div class="box">
         <img src="images/flatsandbuildings.png" alt="">
         <h3>flats and buildings</h3>
         <p>Elevating Urban Living: Discover Flats and Buildings Crafted for Modern Life – Where Design and Functionality Converge.</p>
      </div>

      <div class="box">
         <img src="images/shop.png" alt="">
         <h3>shops</h3>
         <p>Your Business, Your Space: Find Shops That Transform Your Vision into Reality – Where Commerce Meets Community.</p>
      </div>

     

   </div>

</section>

<!-- services section ends -->

<!-- listings section starts  -->

<section class="listings">

   <h1 class="heading">Explore Our Newest Listings</h1>

   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view</a>
               <input type="submit" value="Enquiry" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>

</section>

<!-- listings section ends -->

<!-- Further Enhanced Post Property Section starts -->
<div class="enhancedPageComponent">
    <div class="propertyImageContainer">
        <img src="images/post.jpg" alt="Property Image" class="propertyImage">
    </div>
    <div class="propertyDetails">
        <div class="propertyHeading">Are You an Owner?</div>
        <div class="propertySubDescription">Post Your Property for <span class="highlightedText">FREE</span></div>
        <form action="post_property.php" method="post">
            <button type="submit" class="postPropertyButton">Post Your Property for FREE</button>
        </form>
    </div>
</div>
<!-- Further Enhanced Post Property Section ends -->





<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>

</body>
</html>