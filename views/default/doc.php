<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../asset/css/main.css">
    <title>Documentation</title>
</head>
<body>
    <h2>Docs</h2>
    <div class="doc">
        <h4>Install</h4>
        <div class="name">
            <p>If you want to prepare this framework for your database you need to setup little things
            like config/install.json file. In this file you have 2 settings called "install" and "dbname".
            First you must set the "dbname" you want to use for your project and then "install" (set "on" to install or "off" to not install).
            After go to (http://your_project/install), models and DAO will be automaticly generate.</p>
            <p>When install is ok you can remove the link from routing config file.</p>
        </div>
    </div>
    <div class="doc">
        <h4>Santa Crud</h4>
        <div class="name">
            <p><strong>load()</strong></p>
            <p>You can use load() method to retrieve an entry in your database but you must set an ID to the created entity before.</p><br>
            <p>Example: </p>
            <p><em>$user = new User();</em></p>
            <p><em>$user->set_id("id you want to retrieve");</em></p>
            <p><em>$user->load()</em></p>
            <div class="divider"></div>
            <p><strong>update()</strong></p>
            <p>Update() method can create or update an entry in your database, if you want to update it you need to specify the id of the entity and to be sure which attribute you want.</p><br>
            <p>Example: </p>
            <p><em>$user = new User();</em></p>
            <p><em><strong>this line only if you need to update : </strong>$user->set_id("id you want to update");</em></p>
            <p><em>$user->set_firstname("...")->set_lastname("...")</em></p>
            <p><em>$user->update()</em></p>
            <div class="divider"></div>
            <p><strong>remove()</strong></p>
            <p>You don't know what this method can do? At this stage i can't help you sorry.</p><br>
            <p>Example: </p>
            <p><em>$user = new User();</em></p>
            <p><em>$user->set_id("id you want to remove");</em></p>
            <p><em>$user->remove()</em></p>
        </div>
    </div>
    <div class="doc">
        <h4>God Controller</h4>
        <div class="name">
            <p><strong>How to use</strong></p>
            <p>Each time you create a new controller it has to be an extension of common controller.</p><br>
            <p>Example: </p>
            <p><em>class MyController extends Controller</em></p>
            <div class="divider"></div>
            <p><strong>inputPost()</strong></p>
            <p>In this method all your $_POST are saved in the variable. Every posts are inside an array</p><br>
            <p>Example: </p>
            <p><em>$post = $this->inputPost()</em></p>
            <div class="divider"></div>
            <p><strong>inputGet()</strong></p>
            <p>Same as inputPost() but for the "GET" method.</p>
            <p>Example: </p>
            <p><em>$get = $this->inputGet()</em></p>
            <div class="divider"></div>
            <p><strong>render()</strong></p>
            <p>Render method loads the page from your "view" folder. This method takes two arguments. First argument is a string to
            tell which "view" you want to load. The second argument is an associative array, with the variable name as a key and its value.</p><br>
            <p>Example: </p>
            <p><em>$data = array("name of your variable without $" => "value")</em></p>
            <p><em>$path = "path/to/views" (without file extension)</em></p>
            <p><em>$this->render($path, $data)</em></p>
        </div>
    </div>
    <div class="doc">
        <h4>Models of your life</h4>
        <div class="name">
            <p><strong>Setter/Getter</strong></p>
            <p>All of your models you've created with this install method have setter and getter automaticly create. 
            In this example you have the exactly synthax you need to use</p><br>
            <p>Example:</p>
            <p><em>public function set_(name of your database field)</em></p>
            <p><em>public function get_(name of your database field)</em></p>
        </div>
    </div>
    <div class="doc">
        <h4>Where is the Query?</h4>
        <div class="name">
            <p><strong>getQuery()</strong></p>
            <p>For retrieve any query you have created with this QueryBuilder,</p>
            <p>You need to use getQuery() method for retrieve an string with the query.</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')->insert($array)->getQuery()</em></p>
            <p><em>$rep = db->prepare($sql)</em></p>
            <div class="divider"></div>
            <p><strong>getValue()</strong></p>
            <p>All of this method return a query for prepared statement</p>
            <p>You need to use getValue() method for retrieve an array with the value to put in the execute</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')->insert($array)->getQuery()</em></p>
            <p><em>$value = $user->getValue()</em></p>
            <p><em>$rep = db->prepare($sql)</em></p>
            <p><em>$rep->execute($value)</em></p>
            <div class="divider"></div>
            <p><strong>table()</strong></p>
            <p>You must use table method for set the table you need for build query</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')</em></p>
            <div class="divider"></div>
            <p><strong>select()</strong></p>
            <p>Select method is for create an sql query with a selection. Argument are to be string or array.
                String for 1 selection or array for multiple selection.
            </p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')->select("all") will do "SELECT all FROM user"</em></p>
            <div class="divider"></div>
            <p><strong>where()</strong></p>
            <p>You can use where when you have to choose which you want to retrieve. You can put "string" or "array" for arguments. 
            String for 1 choose, array for multiple choose.</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')->select("all")->where("id = 3") will do "SELECT all FROM user WHERE id = :id"</em></p>
            <div class="divider"></div>
            <p><strong>insert()</strong></p>
            <p>With the insert method you must pass an associative array as arguments with your data to insert.</p>
            <p>For date you can write "now" or "NOW()" in the array.</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$array = array("username" => "John", "password" => "1234", "date" => "now")</em></p>
            <p><em>$sql = $user->table('user')->insert($array)</em></p>
            <p><em>Will do "INSERT INTO user(username, password, date) VALUE (:username, :pass, NOW())"</em></p>
            <div class="divider"></div>
            <p><strong>update()</strong></p>
            <p>Same use as insert method.</p>
            <p>For date you can write "now" or "NOW()" in the array.</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$array = array("username" => "John", "password" => "1234", "date" => "now")</em></p>
            <p><em>$sql = $user->table('user')->update($array)</em></p>
            <p><em>Will do "UPDATE user SET username = :username, password = :password, date = NOW()"</em></p>
            <div class="divider"></div>
            <p><strong>delete()</strong></p>
            <p>Delete method is for delete an entry in databse.</p><br>
            <p>Example:</p>
            <p><em>$user = new Query()</em></p>
            <p><em>$sql = $user->table('user')->delete()->where("id = 3")</em></p>
            <p><em>Will do "DELETE FROM user WHERE id = :id"</em></p>
        </div>
    </div>
    <div class="doc">
        <h4>Config</h4>
        <div class="name">
            <p><strong>Routing</strong></p>
            <p>Routing config file is in config/routing.json. All the config are in json and you need to respect the synthax they have.</p>
            <p>The (:) symbol represent a value for $_GET method</p><br>
            <p>Example:</p>
            <p><em>{"/api/users/(:)":{<br>
                        "GET":"UserController:getUserId",<br>
                        "POST":"UserController:updateUser",<br>
                        "DELETE":"UserController:deleteUser"}</em></p>
            <div class="divider"></div>
            <p><strong>Database</strong></p>
            <p>This config are for set your database with your information</p>
            <div class="divider"></div>
            <p><strong>install</strong></p>
            <p>Don't touch this file if you don't know what it can do.
            But if you know and have complete everythings you can do with it, you can remove it.</p>
        </div>
    </div>
</body>
</html>