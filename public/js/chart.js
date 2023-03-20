$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/chart/member-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("memberChart"), {
                
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Numbers of Membership for Month of March',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },
                  

                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/chart/service-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("serviceChart"), {
                
                type: 'line',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Courses & Sections that are using MTICS Printing Service',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },
                  

                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/chart/service-qty",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("QtyChart"), {
                
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Volume of Papers being Printed in Each Service  ',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },


                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/chart/service-color",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("colorChart"), {
                
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Majority of Service Options for Printing Service',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },


                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/chart/user-role",
        dataType: "json",
        success: function (data) {
            console.log(data);

            new Chart(document.getElementById("userChart"), {
                
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Users of MTICS Web Application ',
                        data: data.data,
                        backgroundColor: [
                            "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  },


                });

            
        },
        error: function (error) {
            console.log(error);
        }
    });



});
