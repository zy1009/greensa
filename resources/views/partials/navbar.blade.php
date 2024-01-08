<style>
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      background-color: #333;
      overflow: hidden;
      position: fixed;
      width: 100%;
      top: 0;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #111;
    }

    /* Right-aligned login and register buttons */
    .right-buttons {
      float: right;
    }
</style>
  
  {{-- Navbar --}}
  <ul>
    <li><a href="/ghome" method="GET">Home</a></li>
    <li><a href="/groom" method="GET">Rooms</a></li>
    <li><a href="/gtrain" method="GET">Training Center</a></li>
    <li><a href="/gabout" method="GET">About Us</a></li>
    @auth('guest')
      @php
          $username = session('username');
      @endphp
      <div class="right-buttons">
        <li><a href="#gprofile" method="GET">Halo , {{ $username }}!</a></li>
      </div>
    @endauth
    @guest('guest')
      <div class="right-buttons">
        <li><a href="/glogin" method="GET">Login</a></li>
        <li><a href="/ghome" method="GET">Register</a></li>
      </div>
    @endguest
  </ul>
  {{-- Navbar --}}