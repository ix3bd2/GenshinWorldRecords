import * as types from "./mutation_types";

export default {
  [types.BUFF_CREATE_SET_ERROR](state, error) {
    Object.assign(state, { error });
  },

  [types.BUFF_CREATE_TOGGLE_LOADING](state) {
    Object.assign(state, { error: "", isLoading: !state.isLoading });
  },

  [types.BUFF_CREATE_SET_CREATED](state, created) {
    Object.assign(state, { created });
  },

  [types.BUFF_CREATE_SET_VIOLATIONS](state, violations) {
    Object.assign(state, { violations });
  },

  [types.BUFF_CREATE_RESET](state) {
    Object.assign(state, {
      created: null,
      error: "",
      isLoading: false,
      violations: null,
    });
  },
};
