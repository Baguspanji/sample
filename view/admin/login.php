  <main id="main" style="margin-top: 60px; margin-bottom: 60px;">

    <div class="container">

      <div class="section-title">
        <h2>Profil ZahOlshop</h2>
        <!-- <a href="add" class="btn btn-primary float-right mb-4">Tambah Data</a> -->
      </div>

      <div id="login_div" class="card" style="padding: 10px; border-radius: 20px; border-width: 4px;">
        <div class="col-md-12 text-center">
          <h3>Login Admin</h3>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email..." id="email_field" />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password..." id="password_field" />
          </div>
          <div class="form-group">
            <button onclick="login()" class="btn btn-primary">Login to Account</button>
          </div>
          <div class="form-group">
            <button onclick="google()" class="btn btn-primary">Login Google</button>
          </div>
        </div>
      </div>

    </div>

  </main><!-- End #main -->

  <script type="text/javascript">
    function login() {

      var userEmail = document.getElementById("email_field").value;
      var userPass = document.getElementById("password_field").value;

      firebase.auth().createUserWithEmailAndPassword(userEmail, userPass)
        .then((user) => {
          // Signed in
          // ...
        })
        .catch((error) => {
          var errorCode = error.code;
          var errorMessage = error.message;
          // ..
        });

    }

    function logout() {
      firebase.auth().signOut().then(function() {
        // Sign-out successful.
      }).catch(function(error) {
        // An error happened.
      });
    }

    function google() {
      var provider = new firebase.auth.GoogleAuthProvider();
      firebase.auth().signInWithPopup(provider).then(function(result) {
        var token = result.credential.accessToken;
        var user = result.user;
        document.body.innerHTML += '<form id="dynForm" action="login_post" method="post"><input type="hidden" name="nama" value="'+user.displayName+'"><input type="hidden" name="email" value="'+user.email+'"></form>';
        document.getElementById("dynForm").submit();
        // alert("Nama: " + user.displayName + "\nEmail: " + user.email);

      }).catch(function(error) {
        console.log(error);
      });
    }
  </script>