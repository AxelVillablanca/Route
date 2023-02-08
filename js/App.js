import admin from "./Admin.js";
import cartDisplay from "./cart.js";
import router from "./helpers/Router.js";
import LogIn from "./Login.js";
import responsiveNavbar from "./Navbar.js";
import productDisplay from "./Product.js";

export default async function app() {

  // array with each route
  const routes = [
    { path: "/route/index.html", name: "home", view: () => {}, display: true },
    { path: "/route/productos.html", name: "productos", view: () => productDisplay(), display: true },
    { path: "/route/contacto.html", name: "contacto", view: () => {}, display: true },
    { path: "/route/carrito.html", name: "carrito", view: () => cartDisplay(), display: true },
    { path: "/route/admin.html", name: "admin", view: () => LogIn(), display: false },
  ];

  const match = await router(routes)
  const routerCallback = router(routes)

  responsiveNavbar(match, routes, routerCallback);
}
