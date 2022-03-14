export default [
  {
    name: "BuffList",
    path: "/buffs/",
    component: () =>
      import(/* webpackChunkName: "buff" */ "../components/buff/List"),
  },
  {
    name: "BuffCreate",
    path: "/buffs/create",
    component: () =>
      import(/* webpackChunkName: "buff" */ "../components/buff/Create"),
  },
  {
    name: "BuffUpdate",
    path: "/buffs/edit/:id",
    component: () =>
      import(/* webpackChunkName: "buff" */ "../components/buff/Update"),
  },
  {
    name: "BuffShow",
    path: "/buffs/show/:id",
    component: () =>
      import(/* webpackChunkName: "buff" */ "../components/buff/Show"),
  },
];
