use LoginDB

insert into nhanvien(id,maNV,tenNV,Username,Password,role) values
(3,1,N'Pham Xuan Tung','1','1','Admin')

SELECT n.tenNV, a.CheckInTime 
FROM nhanvien n 
INNER JOIN Attendance a ON n.maNV = a.maNV
WHERE a.CheckOutTime IS NULL;

Select*from nhanvien

ALTER TABLE nhanvien ADD Role NVARCHAR(50) NOT NULL DEFAULT 'Employee';

CREATE TABLE LeaveRequests (
    LeaveID INT IDENTITY(1,1) PRIMARY KEY,
    maNV VARCHAR(10) NOT NULL,
    LeaveDate DATE NOT NULL,
    LeaveType NVARCHAR(100) NOT NULL,
    Status NVARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (maNV) REFERENCES nhanvien(maNV)
);

CREATE TABLE WorkSchedule (
    ScheduleID INT IDENTITY(1,1) PRIMARY KEY,
    maNV VARCHAR(10) NOT NULL,
    WorkDate DATE NOT NULL,
    Shift NVARCHAR(50) NOT NULL,
    FOREIGN KEY (maNV) REFERENCES nhanvien(maNV)
);

CREATE TABLE MonthlyAttendance (
    AttendanceID INT IDENTITY(1,1) PRIMARY KEY,
    maNV VARCHAR(10) NOT NULL,
    Month INT NOT NULL,
    Year INT NOT NULL,
    TotalHours INT DEFAULT 0,
    FOREIGN KEY (maNV) REFERENCES nhanvien(maNV)
);
