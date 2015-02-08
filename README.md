# AutoHomeServer-User
Server Repo



##Framework Docs

###Code Structure
- **App** : PHP Code in MVC format to modify the web application
 - _Controllers_ : Handle code logic and alorithms as well as setting up data for front-end
   - the name of class much match filename. e.g., device.php contains a class named device
 - _Models_ : Code for Database queries, CRUD and special queries for each object
  - the name of class much match filename. e.g., device_model.php contains a class named device_model
 - _Objects_ : PHP Classes that model a db row. e.g., a device will have the fields of a row in device, but can have special functions to perform device specific actions if needed
 - _Views_ : PHP/HTML files that are used for front-end, called by controllers
   - Templates : folder that holds all visuals that re-occur throughout the site, such as menu, headers and footers.
   - Each controller is setup up to have its own folder and main view in that folder.
- **Assets** : Non-PHP resources for web application
 - _Images_
 - _CSS_ - includes LESS stuff if used
 - _JS_  - all js files
 - _Fonts_ - any non-standard fonts used go here
- **System** : PHP files that pull the web application together. We should not change these


###Built in Functions and Constants, and Variables
- Constants are set in system/config.php --> constants array:
  - base_url : 'http://54.175.106.223/project/',
  - util_url : '/project/system/', // start with a /, used for file_includes
  - app_url : '/project/app/', // start with a /, used for file_includes
  - main_title : 'AutoHome',
  - default_controller : 'home'
- $app is the main framework object "$app" that has framework specific functions and objects to access
 - Controllers, Models and Views all have acess to $this->app
- $route : An Array of the current URL Path.
 - 'controller' - the controller to call
 - 'function' - the function located in the controller
 - 'params' - the params passed to that function
 - e.g. base_url/devices/update/12: 
  - Tanslates to controller="device", function="update", $params = 12
  - The $app flow will translate the route then create an instance of controller("device" in this case) and call <code>$device->update($params);</code>
- Including other PHP files: Controllers, models, views and objects all have a function to include them.
 - <code>load_object(String)</code> : Objects are not instantiate, so you have to create the object after loading the class.
  ```php
$this->app->load_object('device'); //does not instantiate an object of class_named device
$device = new device();
```
 - <code>load_model(String)</code> : Models are instantiated when loaded by the app and can be used immediateley from $this->app->$model_name
  ```php
$this->app->load_model('user_model');//Instantiates an object of the class loaded with same name as file
$user_model = &$this->app->user_model; //Does not have to reference (the "&" operator, but is more efficient)
```
 - <code>load_view(String)</code> : Views are not objects, but once loaded will display whatever they have in them.
  ```php
if( $this->app->_logged ) //if user is logged in
  $this->app->load_view( 'home' ); // includes app/views/home.php
else 
  $this->app->load_view('landing'); // includes app/views/landing.php
  
  //The user will now see whatever is contained in home.php or landing.php depending on if the user is logged in.
  ```
  - <code>load_view(String, Array)</code> : Views can also have data passed to them. This allows for the view to change based on the data provided 
  ```php
//You can also pass data to the views by an array
// for example BASE_URL/devices/view/12
$this->app->load_model('device_model');
$device = $this->app->device_model->get_by_id(12); //not an implemented function, but would get device with ID:12
$data = new array('device' => $device); //the array has an object of class device in it ot be passed to the view
$this->app->load_view('devices/view_device',$data); // includes app/views/devices/view_device.php
//view_device php could then use $data['device'] to display that devices data

  ```
- <code>redirect(String)</code> : used to redirect to a new URL, will be redirected to BASE_URL.String."/"
  ```PHP
//after creating a new system, get the ID and redirect to the page to view that system
$system_id = $system_model->get_last_id();
$this->app->redirect("systems/view/".$system_id);
  ```  
- Database: $this-app->DB is a PHP PDO objec that is connected to DB already.
 - e.g.
  ```PHP
$sql = "SELECT * FROM `table_name` ORDER BY `date_created` DESC";
$stmt = $this->app->db->query( $sql);
  ```  

###The Databse Object
- Accessed by $this->app->db, is a class wrapper for PHP's PDO object class.
- Makes running databse queries much easier
- Automatically connects to the Database specified in system/config.php
- <code>handler()</code> : Returns the PDO handler, if want to custom use PDO
- <code>query(String $prepd_query, Array $arr_values=false)</code> : Uses PDO handler to 
- <code>last_id()</code> : if last query was an insert in the db on a table with auto-increment, this will return that new rows ID
- <code>escape_str($str, $quote = TRUE)</code> : escpape a string



###Framework Example
- Add section of site to model a db table. Adding CRUD ability and menu item.
- This example will be a device as used in this project. We wont create object/device.php for simplicity of example.
- Base files to create 
 - app/controllers/devices.php : controller names a usually plural like db tables
  ```php
<?php
class devices extends controller {
  //not required, but useful so we dont have to load_model('device') in each function
  function __construct() {
    parent::__construct();
    $this->app->load_model('device_model');
  }
}
  ```
 - app/models/device_model.php : not-plural and add 
  ```php
<?php
class device_model extends model {
  
  //overiding is required since the system/model uses table_name
  function __construct()
  {
    parent::__construct();
    $this->table_name = "devices";
  }
}
  ```
 - app/views/devices/create_device.php
 - app/views/devices/read_device.php
 - app/views/devices/update_device.php
 - app/views/devices/delete_device.php
 - app/views/devices/main_devices.php
- Set-up URL paths for CRUD. 
 - We will create a form that will POST to base_url/devices/add, the controller will add that device in DB, and the website will redirect to view the new device
  - edit the app/views/devices/add_device.php

  ```php
<!-- add a device-->
<!DOCTYPE html>
<html lang="en">
<head>
<?php
//the HTML Title
$data['title'] = "Dashboard : New Device";
//This will include the headers(include css, js etc.)
$this->load_view('template/header_files',$data);
?>
</head>

<body> 
  <div class="container">
    <div class="row topbar">
      <a href="<?php echo base_url;?>"><div class="logo pull-left"></div></a>
    </div>
    <div class="row">
      <h1 class="group-title col-md-4">Add a New Device Type</h1>
      <?php 
        //this includes the menu
        $this->load_view('template/nav',$data);
      ?>
      <!-- WE WILL BEGIN THE FORMS TO ADD A NEW DEVICE -->
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <form  class="form-horizontal" role="form" method="POST" action="<?php echo base_url;?>device/add">
            <!-- Add labels and inputs for device-->
          </form>
        </div>
      </div>
    </div>

  </div>  
    <!-- We load the JS files after everything else -->
    <?php $this->load_view('template/scripts'); ?>
</body>
</html>
  ```
  - controllers/devices.php append:
  ```php
function add() {
  //check the POST
  if(isset($_POST['device_name']) && !empty($_POST['device_name']) /* verify other attribues*/) {
    //can check if the data is safe, perform a sanitize function
    $data = array(
      "device_name" => $_POST['device_name']
    );

    //since we included the model in constructor, lets insert the row
      if( $this->app->device_model->create($data) ) {
        $device_id = $this->app->device_model->get_last_id();
        //view that new device
        $this->app->redirect("systems/view/".$device_id);
      }
  }
}
