import * as types from "./mutation_types";

export default {
  [types.ARTIFACT_SHOW_RESET](state) {
    Object.assign(state, {
      error: "",
      isLoading: false,
      retrieved: null,
    });
  },

  [types.ARTIFACT_SHOW_SET_ERROR](state, error) {
    Object.assign(state, { error });
  },

  [types.ARTIFACT_SHOW_SET_RETRIEVED](state, retrieved) {
    Object.assign(state, { retrieved });
  },

  [types.ARTIFACT_SHOW_TOGGLE_LOADING](state) {
    Object.assign(state, { error: "", isLoading: !state.isLoading });
  },
};
