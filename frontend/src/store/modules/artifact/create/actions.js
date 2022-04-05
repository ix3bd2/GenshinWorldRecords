import SubmissionError from "../../../../error/SubmissionError";
import fetch from "../../../../utils/fetch";
import * as types from "./mutation_types";

export const create = ({ commit }, values) => {
  commit(types.ARTIFACT_CREATE_SET_ERROR, "");
  commit(types.ARTIFACT_CREATE_TOGGLE_LOADING);

  return fetch("artifacts", { method: "POST", body: JSON.stringify(values) })
    .then((response) => {
      commit(types.ARTIFACT_CREATE_TOGGLE_LOADING);

      return response.json();
    })
    .then((data) => {
      commit(types.ARTIFACT_CREATE_SET_CREATED, data);
    })
    .catch((e) => {
      commit(types.ARTIFACT_CREATE_TOGGLE_LOADING);

      if (e instanceof SubmissionError) {
        commit(types.ARTIFACT_CREATE_SET_VIOLATIONS, e.errors);
        // eslint-disable-next-line
        commit(types.ARTIFACT_CREATE_SET_ERROR, e.errors._error);

        return;
      }

      commit(types.ARTIFACT_CREATE_SET_ERROR, e.message);
    });
};

export const reset = ({ commit }) => {
  commit(types.ARTIFACT_CREATE_RESET);
};
