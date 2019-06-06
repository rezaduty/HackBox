On Error Resume Next

Const wbemFlagReturnImmediately = &h10
Const wbemFlagForwardOnly = &h20

If wscript.arguments.count=0 Then wscript.quit
strComputer = wscript.arguments(0)

   WScript.Echo
   WScript.Echo "=========================================="
   WScript.Echo "Computer: " & strComputer
   WScript.Echo "=========================================="

   Set objWMIService = GetObject("winmgmts:\\" & strComputer & "\root\CIMV2")
   Set colItems = objWMIService.ExecQuery("SELECT * FROM Win32_Processor", "WQL", _
                                          wbemFlagReturnImmediately + wbemFlagForwardOnly)

   For Each objItem In colItems
      WScript.Echo "AddressWidth: " & objItem.AddressWidth
      WScript.Echo "Architecture: " & objItem.Architecture
      WScript.Echo "Availability: " & objItem.Availability
      WScript.Echo "Caption: " & objItem.Caption
      WScript.Echo "ConfigManagerErrorCode: " & objItem.ConfigManagerErrorCode
      WScript.Echo "ConfigManagerUserConfig: " & objItem.ConfigManagerUserConfig
      WScript.Echo "CpuStatus: " & objItem.CpuStatus
      WScript.Echo "CreationClassName: " & objItem.CreationClassName
      WScript.Echo "CurrentClockSpeed: " & objItem.CurrentClockSpeed
      WScript.Echo "CurrentVoltage: " & objItem.CurrentVoltage
      WScript.Echo "DataWidth: " & objItem.DataWidth
      WScript.Echo "Description: " & objItem.Description
      WScript.Echo "DeviceID: " & objItem.DeviceID
      WScript.Echo "ErrorCleared: " & objItem.ErrorCleared
      WScript.Echo "ErrorDescription: " & objItem.ErrorDescription
      WScript.Echo "ExtClock: " & objItem.ExtClock
      WScript.Echo "Family: " & objItem.Family
      WScript.Echo "InstallDate: " & WMIDateStringToDate(objItem.InstallDate)
      WScript.Echo "L2CacheSize: " & objItem.L2CacheSize
      WScript.Echo "L2CacheSpeed: " & objItem.L2CacheSpeed
      WScript.Echo "LastErrorCode: " & objItem.LastErrorCode
      WScript.Echo "Level: " & objItem.Level
      WScript.Echo "LoadPercentage: " & objItem.LoadPercentage
      WScript.Echo "Manufacturer: " & objItem.Manufacturer
      WScript.Echo "MaxClockSpeed: " & objItem.MaxClockSpeed
      WScript.Echo "Name: " & objItem.Name
      WScript.Echo "OtherFamilyDescription: " & objItem.OtherFamilyDescription
      WScript.Echo "PNPDeviceID: " & objItem.PNPDeviceID
      strPowerManagementCapabilities = Join(objItem.PowerManagementCapabilities, ",")
         WScript.Echo "PowerManagementCapabilities: " & strPowerManagementCapabilities
      WScript.Echo "PowerManagementSupported: " & objItem.PowerManagementSupported
      WScript.Echo "ProcessorId: " & objItem.ProcessorId
      WScript.Echo "ProcessorType: " & objItem.ProcessorType
      WScript.Echo "Revision: " & objItem.Revision
      WScript.Echo "Role: " & objItem.Role
      WScript.Echo "SocketDesignation: " & objItem.SocketDesignation
      WScript.Echo "Status: " & objItem.Status
      WScript.Echo "StatusInfo: " & objItem.StatusInfo
      WScript.Echo "Stepping: " & objItem.Stepping
      WScript.Echo "SystemCreationClassName: " & objItem.SystemCreationClassName
      WScript.Echo "SystemName: " & objItem.SystemName
      WScript.Echo "UniqueId: " & objItem.UniqueId
      WScript.Echo "UpgradeMethod: " & objItem.UpgradeMethod
      WScript.Echo "Version: " & objItem.Version
      WScript.Echo "VoltageCaps: " & objItem.VoltageCaps
      WScript.Echo
   Next



Function WMIDateStringToDate(dtmDate)
WScript.Echo dtm: 
	WMIDateStringToDate = CDate(Mid(dtmDate, 5, 2) & "/" & _
	Mid(dtmDate, 7, 2) & "/" & Left(dtmDate, 4) _
	& " " & Mid (dtmDate, 9, 2) & ":" & Mid(dtmDate, 11, 2) & ":" & Mid(dtmDate,13, 2))
End Function