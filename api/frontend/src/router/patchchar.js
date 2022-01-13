export default [
  {
    name: "PatchCharList",
    path: "/patch_chars/",
    component: () =>
      import(
        /* webpackChunkName: "patchchar" */ "../components/patchchar/List"
      ),
  },
  {
    name: "PatchCharCreate",
    path: "/patch_chars/create",
    component: () =>
      import(
        /* webpackChunkName: "patchchar" */ "../components/patchchar/Create"
      ),
  },
  {
    name: "PatchCharUpdate",
    path: "/patch_chars/edit/:id",
    component: () =>
      import(
        /* webpackChunkName: "patchchar" */ "../components/patchchar/Update"
      ),
  },
  {
    name: "PatchCharShow",
    path: "/patch_chars/show/:id",
    component: () =>
      import(
        /* webpackChunkName: "patchchar" */ "../components/patchchar/Show"
      ),
  },
];
