export default [
  {
    name: "WeaponList",
    path: "/weapons/",
    component: () =>
      import(/* webpackChunkName: "weapon" */ "../components/weapon/List"),
  },
  {
    name: "WeaponCreate",
    path: "/weapons/create",
    component: () =>
      import(/* webpackChunkName: "weapon" */ "../components/weapon/Create"),
  },
  {
    name: "WeaponUpdate",
    path: "/weapons/edit/:id",
    component: () =>
      import(/* webpackChunkName: "weapon" */ "../components/weapon/Update"),
  },
  {
    name: "WeaponShow",
    path: "/weapons/show/:id",
    component: () =>
      import(/* webpackChunkName: "weapon" */ "../components/weapon/Show"),
  },
];
