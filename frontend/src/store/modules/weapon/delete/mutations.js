import * as types from "./mutation_types";

export default {
  [types.WEAPON_DELETE_SET_DELETED](state, deleted) {
    Object.assign(state, { deleted });
  },

  [types.WEAPON_DELETE_SET_ERROR](state, error) {
    Object.assign(state, { error });
  },

  [types.WEAPON_DELETE_TOGGLE_LOADING](state) {
    Object.assign(state, { error: "", isLoading: !state.isLoading });
  },

  [types.WEAPON_DELETE_RESET](state) {
    Object.assign(state, {
      deleted: null,
      error: "",
      isLoading: false,
    });
  },
};
