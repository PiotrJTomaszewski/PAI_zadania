import React from "react";

class Filter extends React.Component {
  handleCheckboxChange = (event) => {
    this.props.parentFilterCallback(event.target.checked);
  };

  render() {
    return (
      <div>
        <label>
          <input type="checkbox" onChange={this.handleCheckboxChange}></input>
          hide completed
        </label>
      </div>
    );
  }
}

export default Filter;
