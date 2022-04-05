export default [{
        name: "CharacterList",
        path: "/characters/",
        component: () =>
            import (
                /* webpackChunkName: "character" */
                "../components/character/List"
            ),
    },
    {
        name: "CharacterCreate",
        path: "/characters/create",
        component: () =>
            import (
                /* webpackChunkName: "character" */
                "../components/character/Create"
            ),
    },
    {
        name: "CharacterUpdate",
        path: "/characters/edit/:id",
        component: () =>
            import (
                /* webpackChunkName: "character" */
                "../components/character/Update"
            ),
    },
    {
        name: "CharacterShow",
        path: "/characters/show/:id",
        component: () =>
            import (
                /* webpackChunkName: "character" */
                "../components/character/Show"
            ),
    },
];