export default [
  {
    name: "ArtifactList",
    path: "/artifacts/",
    component: () =>
      import(/* webpackChunkName: "artifact" */ "../components/artifact/List"),
  },
  {
    name: "ArtifactCreate",
    path: "/artifacts/create",
    component: () =>
      import(
        /* webpackChunkName: "artifact" */ "../components/artifact/Create"
      ),
  },
  {
    name: "ArtifactUpdate",
    path: "/artifacts/edit/:id",
    component: () =>
      import(
        /* webpackChunkName: "artifact" */ "../components/artifact/Update"
      ),
  },
  {
    name: "ArtifactShow",
    path: "/artifacts/show/:id",
    component: () =>
      import(/* webpackChunkName: "artifact" */ "../components/artifact/Show"),
  },
];
