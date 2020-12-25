<style>



.sticky-offset {
    top: 56px;
}

#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    /* background-color: #333; */
    border:1px solid grey;
    padding: 0;
}

/* Sidebar sizes when expanded and expanded */
.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}

/* Menu item*/
#sidebar-container .list-group a {
    height: 50px;
    color: white;
}

/* Submenu item*/
#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}

/* Separators */
.sidebar-separator-title {
    /* background-color: #333; */
    /* height: 35px; */
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    /* background-color: #333;     */
    /* height: 60px; */
}

/* Closed submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
/* Opened submenu icon */
#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
.list-group-item{
    border: 1px solid rgba(0, 0, 0, 0) !important;
}
.navbar-dark .navbar-nav .nav-link{
color:black;
font-size:14px;
}

.fixed-top{
  top: 0;
right: 0;
left: 0;
z-index: 1030;
position: relative;
}
.navbar-dark .navbar-nav .active > .nav-link{
    color:black;
}
.nav-link{
    font-size:12px!important;
}
</style>