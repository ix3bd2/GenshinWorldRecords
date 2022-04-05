import * as types from "./mutation_types";

export default {
  [types.WEAPON_SHOW_RESET](state) {
    Object.assign(state, {
      error: "",
      isLoading: false,
      retrieved: null,
    });
  },

  [types.WEAPON_SHOW_SET_ERROR](state, error) {
    Object.assign(state, { error });
  },

  [types.WEAPON_SHOW_SET_RETRIEVED](state, retrieved) {
    Object.assign(state, { retrieved });
  },

  [types.WEAPON_SHOW_TOGGLE_LOADING](state) {
    Object.assign(state, { error: "", isLoading: !state.isLoading });
  },
};
