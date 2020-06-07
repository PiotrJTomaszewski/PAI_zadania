import React from "react";

import "./App.css";
import Filter from "./Filter";
import ToDoList from "./ToDoList";
import NewTask from "./NewTask";

class App extends React.Component {
  state = {
    tasks: [],
    next_task_id: 0,
    hide_completed: false,
  };

  taskChangeCompletedCallback = (task_id, new_status) => {
    this.setState((prev_state) => {
      var tasks = prev_state.tasks;
      tasks[task_id].is_done = new_status;
      return {
        ...prev_state,
        tasks: tasks,
      };
    });
  };

  addTaskCallback = (task_name) => {
    this.setState((prev_state) => {
      return {
        ...prev_state,
        tasks: [
          ...prev_state.tasks,
          {
            name: task_name,
            is_done: false,
            id: prev_state.next_task_id,
          },
        ],
        next_task_id: prev_state.next_task_id + 1,
      };
    });
  };

  filterCallback = (new_filter_state) => {
    this.setState((prev_state) => ({
      ...prev_state,
      hide_completed: new_filter_state,
    }));
  };

  render() {
    return (
      <div className="App">
        <header className="App-header">Welcome to my To Do list!</header>
        <main>
          <div className="box">
            <Filter parentFilterCallback={this.filterCallback} />
            <hr className="divider" />
            <ToDoList
              tasks={this.state.tasks}
              hide_completed={this.state.hide_completed}
              parentTaskChangeCompletedCallback={
                this.taskChangeCompletedCallback
              }
            />
            <hr className="divider" />
            <NewTask parentAddTaskCallback={this.addTaskCallback} />
          </div>
        </main>
      </div>
    );
  }
}

export default App;
