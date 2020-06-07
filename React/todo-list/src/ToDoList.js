import React from "react";

import Task from "./Task";

function ToDoList(props) {
  var tasks_to_display;
  if (props.hide_completed) {
    tasks_to_display = props.tasks.filter((task) => {
      return !task.is_done;
    });
  } else {
    tasks_to_display = props.tasks;
  }
  if (tasks_to_display.length > 0) {
    return (
      <div className="task-list">
        {tasks_to_display.map((task) => {
          return (
            <div className="task-list-item">
              <Task
                key={task.id}
                id={task.id}
                task_done={task.is_done}
                task_name={task.name}
                parentCheckboxChangeCallback={
                  props.parentTaskChangeCompletedCallback
                }
              />
            </div>
          );
        })}
      </div>
    );
  }
  return "Nothing to do...";
}

export default ToDoList;
