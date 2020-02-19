const initialState = {
    openedModal: null
  };
  export const clickReducer = (state = initialState, action) => {
    switch (action.type) {
      case 'TOGGLE_MODAL':
        return {
          ...state,
          openedModal: action.openedModal
        };
      default:
        return state;
    }
  };